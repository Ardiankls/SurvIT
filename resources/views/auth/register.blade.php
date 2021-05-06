@extends('layouts.head')

{{--@section('content')--}}
<div class="container-fluid vh-100">
    <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12 vh-100 bg-danger text-center p-5" id="gradient">
                        <div class="container-sm mt-5 ">
                            <img class="logo w-75 mt-5" src="{{ asset('assets/assets/logo/logoWhite.svg') }}" alt="">
                            <p class="mt-5 font-weight-bold text-white"> Mari Ikut Serta Mendorong Perkembangan UMKM dan Bisnis Di Indonesia Hanya Dengan Mengisi Survey</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="row p-5">
                    <div class="col-sm-6">
                        <img class="logo w-25" src="{{ asset('assets/assets/logo/logoBlack.svg') }}" alt="">
                    </div>
                    <div class="col-sm-6 text-right">
                        <div class="btn btn-sm btn-light "> Sign Up</div>
                        <div class="btn btn-sm btn-primary "> Log In</div>
                    </div>
                </div>
                <div class="row bg-danger">
                    <div class="col-12 text-center bg-success">
                        <div class="container ">
                            <h1 class="font-weight-bold">SIGN UP</h1>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-8 bg-danger">
                                        <div class="col-4">
                                            <input id="first_name" type="text"
                                                   class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                                   value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="First Name" autofocus>
                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-4">
                                            <input id="last_name" type="text"
                                                   class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                                   value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Last Name" autofocus>
                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-4">
                                            <input id="last_name" type="text"
                                                   class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                                   value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Last Name" autofocus>
                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="username" type="text"
                                               class="form-control @error('username') is-invalid @enderror" name="username"
                                               value="{{ old('username') }}" required autocomplete="username" placeholder="Username" autofocus>
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Passoword" required
                                               autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required autocomplete="new-password"  placeholder="Confirm Password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">

        </div>
    </div>
</div>
</div>
{{--@endsection--}}
