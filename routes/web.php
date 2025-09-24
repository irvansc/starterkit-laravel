<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\AuthController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\RoleController;
use App\Http\Controllers\Back\PermissionController;
use App\Http\Controllers\Back\UserListController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Back\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// ROUTE BACKEND
Route::prefix('auth')->name('auth.')->middleware('guest')->group(function () {
    Route::view('/login', 'back.pages.auth.login')->name('login');
    Route::view('/register', 'back.pages.auth.register')->name('register');
    Route::get('/forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('forgot-password');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('forgot-password.send');
    Route::post('/reset-password', [AuthController::class, 'reset'])->name('reset-password');
});
// Tambahkan di luar prefix agar namanya password.reset saja
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');

// Email Verification Routes
Route::get('/email/verify', function () {
    if (!auth()->check()) {
        return redirect()->route('auth.login')
            ->with('fail', 'Silakan login terlebih dahulu.');
    }
    return view('auth.verify-email');
})->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (Request $request, $id, $hash) {
    $user = User::find($id);

    if (!$user) {
        return redirect()->route('auth.login')
            ->with('fail', 'User tidak ditemukan.');
    }

    if (!hash_equals(sha1($user->getEmailForVerification()), $hash)) {
        return redirect()->route('auth.login')
            ->with('fail', 'Link verifikasi tidak valid.');
    }

    if ($user->hasVerifiedEmail()) {
        return redirect()->route('auth.login')
            ->with('success', 'Email sudah diverifikasi sebelumnya. Silakan login.');
    }

    $user->markEmailAsVerified();
    $user->verified = 1;
    $user->save();

    if (auth()->check()) {
        auth()->logout();
    }

    return redirect()->route('auth.login')
        ->with('success', 'Email berhasil diverifikasi! Silakan login.');
})->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    if (!auth()->check()) {
        return redirect()->route('auth.login')
            ->with('fail', 'Silakan login terlebih dahulu.');
    }

    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Link verifikasi telah dikirim ulang!');
})->middleware(['throttle:6,1'])->name('verification.send');

Route::middleware('auth:web')->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('konfigurasi')->name('konfigurasi.')->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('users-list', UserListController::class);
    });
});

// Protected Routes yang memerlukan verifikasi email
Route::middleware(['auth:web'])->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::resource('users', UserController::class);
    Route::post('/change-profile-picture', [UserController::class, 'changeProfilePicture'])->name('change-profile-picture');

    Route::feeds();
    Route::prefix('posts')->name('posts.')->group(function () {
        Route::view('/categories', 'back.pages.posts.categories')->name('categories')->middleware('can:read category');
        Route::view('/add-post', 'back.pages.posts.add-post')->name('add-post')->middleware('can:create post');
        Route::post('/create', [PostController::class, 'createPost'])->name('create');
        Route::view('/all-post', 'back.pages.posts.all_posts')->name('all_posts')
            ->middleware('can:read post');
        Route::get('/edit-posts', [PostController::class, 'editPost'])->name('edit-posts')
            ->middleware('can:update post');
        Route::post('/update-post', [PostController::class, 'updatePost'])->name('update-post')
            ->middleware('can:update post');
        Route::post('/post-upload', [PostController::class, 'contentImage'])->name('post-upload')
            ->middleware('can:create post');
    });
});
