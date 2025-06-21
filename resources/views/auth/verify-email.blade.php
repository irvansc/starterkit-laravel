@extends('back.layouts.pages-auth')
@section('title', 'Verifikasi Email')
@section('content')
<div class="text-center">
    <div class="mb-4">
        <h4 class="text-uppercase">Verifikasi Email Anda</h4>
    </div>
    <div class="mb-4">
        <p class="text-muted">
            Sebelum melanjutkan, silakan cek email Anda untuk link verifikasi.
            Jika Anda tidak menerima email tersebut, klik tombol di bawah untuk mengirim ulang.
        </p>
    </div>

    @if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-primary w-100 waves-effect waves-light">
            Kirim Ulang Email Verifikasi
        </button>
    </form>
</div>
@endsection