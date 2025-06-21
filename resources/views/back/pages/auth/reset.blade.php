@extends('back.layouts.pages-auth')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Reset Password')
@section('content')
<div class="card-body pt-0">
    <div class="p-2">
        <form method="POST" action="{{ route('auth.reset-password') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">
            @if(session('success'))
            <div class="alert alert-success text-center mb-4" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @if($errors->any())
            <div class="alert alert-danger text-center mb-4" role="alert">
                {{ $errors->first() }}
            </div>
            @endif
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="email" class="form-control" id="email" value="{{ $email }}" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Password Baru</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password baru"
                    required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    placeholder="Konfirmasi password" required>
            </div>
            <div class="row mb-0">
                <div class="col-12 text-end">
                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset Password</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection