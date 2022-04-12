@extends('layouts.app')

@section('content')
<div class="container-xxl p-5">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header">{{ __('Email Kamu Sudah Terverifikasi') }}</div>

                <div class="card-body">
                    {{ __('Terima kasih, Kamu sudah bisa login dengan akun baru Kamu.') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
