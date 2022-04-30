@extends('layouts.app')

@section('content')
<div class="container-xxl p-5">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">
            <div class="card text-dark">
                <div class="card-header">{{ __('Verfikasi Email Anda') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Link verifikasi baru sudah kami kirim ke email anda.') }}
                        </div>
                    @endif

                    Sebelum Kamu memulai mengisi atau membuat survei, Mohon verifikasi Email anda terlebih dahulu. Kamu bisa mendapatkan <b>500 poin</b> setelah melakukan verifikasi.
                    <br><br>
                    {{ __('Jika anda tidak mendapatkan email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="Submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('klik disini untuk mengirim verifikasi') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
