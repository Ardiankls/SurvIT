@extends('layouts.head')
@section('content2')
    @include('auth.modal.attention')
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
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password" placeholder="Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-8 no-gutters">
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
    {{-- <script>
        $(document).ready(function() {
            // Show the Modal on load
            @if(!$errors->any())
                $("#myModal").modal("show");
            @endif

            // Hide the Modal
            $("#myBtn").click(function() {
                $("#myModal").modal("hide");
            });

            $("#myBtn2").click(function() {
                $("#myModal").modal("hide");
            });
        });
    </script> --}}
@endsection
