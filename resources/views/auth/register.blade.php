@extends('layouts.head')

{{--@section('content')--}}
{{--@include('auth.modal.verifymodal')--}}
@section('content2')
    <div class="col-md-8 ">
        <div class="row p-5">
            <div class="col-sm-6">
                <img class="logo w-25" src="{{ asset('assets/assets/logo/logoBlack.svg') }}" alt="">
            </div>
            <div class="col-sm-6 text-right">
                <a class="btn btn-sm btn-light " href="{{ route('register') }}"> Sign Up</a>
                <a class="btn btn-sm btn-primary" href="{{ route('login') }}"> Log In</a>
            </div>
        </div>


        <div class="row mt-4 mb-5">

            <div class="col-4"></div>
            <div class="col-6"><h1 class="font-weight-bold">SIGN UP</h1></div>

        </div>
        <div class="row ">
            <div class="col-4"></div>
            <div class="col-6 ">
                <div class="row ">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 ">
                                <input id="first_name" type="text"
                                       class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                       value="{{ old('first_name') }}" required autocomplete="first_name"
                                       placeholder="First Name" autofocus>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input id="last_name" type="text"
                                       class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                       value="{{ old('last_name') }}" required autocomplete="last_name"
                                       placeholder="Last Name" autofocus>
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
                                   value="{{ old('username') }}" required autocomplete="username" placeholder="Username"
                                   autofocus>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" placeholder="Email" required
                                   autocomplete="email">

                            @error('email')
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
                                   placeholder="Confirm Password">
                        </div>

                        <button type="submit" data-toggle="modal" data-target="#verifymodal" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--                            <form method="POST" action="{{ route('register') }}">--}}
    {{--                                @csrf--}}
    {{--                                <div class="form-group">--}}
    {{--                                    <div class="form-row">--}}
    {{--                                        <div class="col-sm-3">--}}
    {{--                                                <input id="first_name" type="text"--}}
    {{--                                                       class="form-control @error('first_name') is-invalid @enderror" name="first_name"--}}
    {{--                                                       value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="First Name" autofocus>--}}
    {{--                                                @error('first_name')--}}
    {{--                                                <span class="invalid-feedback" role="alert">--}}
    {{--                                                <strong>{{ $message }}</strong>--}}
    {{--                                                </span>--}}
    {{--                                                @enderror--}}
    {{--                                        </div>--}}
    {{--                                        <div class="col-sm-3">--}}
    {{--                                                <input id="last_name" type="text"--}}
    {{--                                                       class="form-control @error('last_name') is-invalid @enderror" name="last_name"--}}
    {{--                                                       value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Last Name" autofocus>--}}
    {{--                                                @error('last_name')--}}
    {{--                                                <span class="invalid-feedback" role="alert">--}}
    {{--                                                <strong>{{ $message }}</strong>--}}
    {{--                                                </span>--}}
    {{--                                                @enderror--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <div class="form-group row">--}}
    {{--                                    <div class="col-6">--}}
    {{--                                        <input id="username" type="text"--}}
    {{--                                               class="form-control @error('username') is-invalid @enderror" name="username"--}}
    {{--                                               value="{{ old('username') }}" required autocomplete="username" placeholder="Username" autofocus>--}}
    {{--                                        @error('username')--}}
    {{--                                        <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                        </span>--}}
    {{--                                        @enderror--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}

    {{--                                <div class="form-group row">--}}
    {{--                                    <div class="col-6">--}}
    {{--                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"--}}
    {{--                                               name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">--}}

    {{--                                        @error('email')--}}
    {{--                                        <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                        </span>--}}
    {{--                                        @enderror--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}

    {{--                                <div class="form-group row">--}}
    {{--                                    <div class="col-6">--}}
    {{--                                        <input id="password" type="password"--}}
    {{--                                               class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Passoword" required--}}
    {{--                                               autocomplete="new-password">--}}
    {{--                                        @error('password')--}}
    {{--                                        <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                        </span>--}}
    {{--                                        @enderror--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}

    {{--                                <div class="form-group row">--}}
    {{--                                    <div class="col-6">--}}
    {{--                                        <input id="password-confirm" type="password" class="form-control"--}}
    {{--                                               name="password_confirmation" required autocomplete="new-password"  placeholder="Confirm Password">--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}

    {{--                                <div class="form-group row mb-0">--}}
    {{--                                    <div class="col-6 offset-md-4">--}}
    {{--                                        <button type="submit" class="btn btn-primary">--}}
    {{--                                            {{ __('Register') }}--}}
    {{--                                        </button>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </form>--}}

@endsection
