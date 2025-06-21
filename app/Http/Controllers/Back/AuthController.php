<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->route('auth.login');
    }

    public function showLinkRequestForm()
    {
        return view('back.pages.auth.forgot');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['success' => 'Tautan untuk reset password telah dikirim ke email Anda. Silakan cek kotak masuk atau folder spam.'])
            : back()->withErrors(['email' => 'Kami tidak dapat mengirim tautan reset password ke email tersebut. Pastikan email sudah benar dan terdaftar.']);
    }

    public function showResetForm($token, Request $request)
    {
        $email = $request->query('email', '');
        $pageTitle = 'Reset Password';
        return view('back.pages.auth.reset', ['token' => $token, 'email' => $email, 'pageTitle' => $pageTitle]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.exists' => 'Email tidak terdaftar.',
            'password.required' => 'Password baru wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->setRememberToken(Str::random(60));
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('auth.login')->with('success', 'Password Anda berhasil direset. Silakan login dengan password baru Anda.')
            : back()->withErrors(['email' => 'Reset password gagal. Silakan ulangi proses atau hubungi admin jika masalah berlanjut.']);
    }
}
