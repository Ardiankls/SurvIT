@extends('layouts.head')

@section('content2')

    <div class="container-fluid vh-100 ">
        <div class="row ">
            <div class="col-md-4 d-none d-md-block">
                <div class="row">
                    <div class="col-md-12 vh-100 bg-danger text-center p-5 " id="gradient">
                        <div class="container-sm mt-5 ">
                            <img class="logo w-75 mt-5" src="{{ asset('assets/assets/logo/logoWhite.svg') }}" alt="">
                            <p class="mt-5 font-weight-bold text-white"> Mari Ikut Serta Mendorong Perkembangan UMKM dan
                                Bisnis Di Indonesia Hanya Dengan Mengisi Survey</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row p-5">
                    <div class="col-sm-6 d-none d-md-block">
                        <img class="logo w-25" src="{{ asset('assets/assets/logo/logoBlack.svg') }}" alt="">
                    </div>
                    <div class="col-sm-6 text-right">
                        <a class="btn btn-sm btn-primary " href="{{ route('register') }}"> Sign Up</a>
                        <a class="btn btn-sm btn-light" href="{{ route('login') }}"> Log In</a>
                    </div>
                </div>

                <div class="row mt-4 mb-5">

                    <div class="col-3 col-md-4"></div>
                    <div class="col-6 d-none d-md-block">
                        <h1 class="font-weight-bold ">SIGN IN</h1>
                    </div>
                    <div class="col-6 no-gutters text-center d-block d-md-none">
                        <img class="logo w-75" src="{{ asset('assets/assets/logo/logoBlack.svg') }}" alt="">
                    </div>

                </div>

                <div class="row ">
                    <div class="col-3 col-md-4"></div>
                    <div class="col-6 ">
                        <div class="row">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-row text-md-left text-center">
                                    <div class="form-group col-md-8">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email"
                                               placeholder="E-Mail Address" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password"
                                               required autocomplete="current-password" placeholder="Password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-8 no-gutters">
                                        @isset($password)
                                            {{$password}}
                                        @endisset
                                        <div class="col-md-12 mb-2 -danger ">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label " for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>


                                        <div class="col-md-12 ">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    <div class="container">--}}
    {{--        <div class="row justify-content-center">--}}
    {{--            <div class="col-md-8">--}}
    {{--                <div class="card">--}}
    {{--                    <div class="card-header">{{ __('Login') }}</div>--}}

    {{--                    <div class="card-body">--}}
    {{--                        <form method="POST" action="{{ route('login') }}">--}}
    {{--                            @csrf--}}

    {{--                            <div class="form-group row">--}}
    {{--                                <label for="email"--}}
    {{--                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}
    {{--                                <div class="col-md-6">--}}
    {{--                                    <input id="email" type="email"--}}
    {{--                                           class="form-control @error('email') is-invalid @enderror" name="email"--}}
    {{--                                           value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

    {{--                                    @error('email')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                    @enderror--}}
    {{--                                </div>--}}
    {{--                            </div>--}}

    {{--                            <div class="form-group row">--}}
    {{--                                <label for="password"--}}
    {{--                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

    {{--                                <div class="col-md-6">--}}
    {{--                                    <input id="password" type="password"--}}
    {{--                                           class="form-control @error('password') is-invalid @enderror" name="password"--}}
    {{--                                           required autocomplete="current-password">--}}

    {{--                                    @error('password')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                    @enderror--}}
    {{--                                </div>--}}
    {{--                            </div>--}}

    {{--                            <div class="form-group row">--}}
    {{--                                <div class="col-md-6 offset-md-4">--}}
    {{--                                    <div class="form-check">--}}
    {{--                                        <input class="form-check-input" type="checkbox" name="remember"--}}
    {{--                                               id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

    {{--                                        <label class="form-check-label" for="remember">--}}
    {{--                                            {{ __('Remember Me') }}--}}
    {{--                                        </label>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}

    {{--                            <div class="form-group row mb-0">--}}
    {{--                                <div class="col-md-8 offset-md-4">--}}
    {{--                                    <button type="submit" class="btn btn-primary">--}}
    {{--                                        {{ __('Login') }}--}}
    {{--                                    </button>--}}

    {{--                                    @if (Route::has('password.request'))--}}
    {{--                                        <a class="btn btn-link" href="{{ route('password.request') }}">--}}
    {{--                                            {{ __('Forgot Your Password?') }}--}}
    {{--                                        </a>--}}
    {{--                                    @endif--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </form>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
