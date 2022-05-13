@extends('layouts.head')
{{-- @include('auth.modal.verifymodal') --}}
@section('content2')
    <div class="container-fluid vh-100 ">
        <div class="row ">
            <div class="col-md-4 d-none d-md-block">
                <div class="row">
                    <div class="col-md-12 vh-100 bg-primary text-center p-5 " id="gradient">
                        <div class="container-sm mt-5 ">
                            <img class="logo w-75 mt-5" src="{{ asset('assets/assets/logo/logoWhite.svg') }}" alt="">
                            <p class="mt-5 font-weight-bold text-white">Kumpulkan Poin dan Dapatkan Hadiah Hanya Dengan
                                Mengisi Survei</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="row p-5">
                    <div class="col-sm-6 d-none d-md-block">
                        <img class="logo w-25" src="{{ asset('assets/assets/logo/logoBlack.svg') }}" alt="">
                    </div>
                    <div class="col-sm-6 text-right">
                        <a class="btn btn-sm btn-light " href="{{ route('register') }}"> Daftar</a>
                        <a class="btn btn-sm btn-primary" href="{{ route('login') }}"> Masuk</a>
                    </div>
                </div>


                <div class="row mt-4 mb-5">

                    <div class="col-3 col-md-4"></div>
                    <div class="col-6 d-none d-md-block">
                        <h1 class="font-weight-bold ">DAFTAR</h1>
                    </div>
                    <div class="col-6 no-gutters text-center d-block d-md-none">
                        <img class="logo w-75" src="{{ asset('assets/assets/logo/logoBlack.svg') }}" alt="">
                    </div>

                </div>
                <div class="row ">
                    <div class="col-3 col-md-4"></div>
                    <div class="col-6 ">
                        <div class="row ">
                            <form  class="text-md-left text-center" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-row ">
                                    <div class="form-group col-md-6 ">
                                        <input id="first_name" type="text"
                                               class="form-control @error('first_name') is-invalid @enderror"
                                               name="first_name"
                                               value="{{ old('first_name') }}" required autocomplete="first_name"
                                               placeholder="Nama Depan" autofocus>
                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input id="last_name" type="text"
                                               class="form-control @error('last_name') is-invalid @enderror"
                                               name="last_name"
                                               value="{{ old('last_name') }}" required autocomplete="last_name"
                                               placeholder="Nama Belakang" autofocus>
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="username" type="text"
                                           class="form-control @error('username') is-invalid @enderror" name="username"
                                           value="{{ old('username') }}" required autocomplete="username"
                                           placeholder="Nama User"
                                           autofocus>
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" placeholder="Email" required
                                           autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="phone" type="tel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           name="phone" value="{{ old('phone') }}" placeholder="Nomor Telepon" required
                                           autocomplete="phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           placeholder="Password" required
                                           autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password"
                                           placeholder="Konfirmasi Password">
                                </div>

                                <button type="submit" data-toggle="modal" data-target="#verifymodal"
                                        class="btn btn-primary">Daftar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
