<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

{{-- OLD Ui Head --}}
{{-- <head> --}}
{{-- <meta charset="utf-8"> --}}
{{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
{{-- <link rel="icon" type="image/svg" sizes="32x32" href="{{ asset('assets/assets/logo/surviticon.png') }}"> --}}
{{-- <!-- CSRF Token --> --}}
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

{{-- <title>{{ config('app.name', 'SurvIT') }}</title> --}}
{{-- <!-- Scripts --> --}}
{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" --}}
{{-- integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" --}}
{{-- crossorigin="anonymous"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
{{--  --}}{{-- Boostrap 5 --}}
{{--  --}}{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" --}}
{{-- integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> --}}
{{--  --}}{{-- DataTables --}}
{{--  --}}{{-- <link type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet"> --}}
{{-- <!-- Fonts --> --}}
{{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
{{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
{{-- <!-- icons --> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"> --}}
{{-- <!-- Styles --> --}}
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" --}}
{{-- integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> --}}
{{-- <link href="{{ asset('assets/style.css') }}" rel="stylesheet"> --}}
{{-- </head> --}}

<head>
    <!-- Google Analytics -->
    @include('analytics')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/svg" sizes="32x32" href="{{ asset('assets/assets/logo/surviticon.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SurvIT') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    {{-- jquerry --}}
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
            integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src='/resources/js/main.js'></script>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

{{-- Old UI Body --}}
{{-- <body style="background-color: #d1d1d1"> --}}
{{-- <div id="app"> --}}
{{-- <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm"> --}}
{{-- <div class="container"> --}}
{{-- <a class="navbar-brand text-white" href="{{ route('usersurvey.index') }}"> --}}
{{-- {{ config('app.name', 'SurvIT') }} --}}
{{-- <img style="height: 30px;" src="/images/survit.png" alt=""> --}}
{{-- </a> --}}
{{-- <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" --}}
{{-- data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" --}}
{{-- aria-label="{{ __('Toggle navigation') }}"> --}}
{{-- <span class="navbar-toggler-icon"></span> --}}
{{-- </button> --}}

{{-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}
{{-- <!-- Left Side Of Navbar --> --}}
{{-- <ul class="navbar-nav mr-auto"> --}}

{{-- </ul> --}}

{{-- <!-- Right Side Of Navbar --> --}}
{{-- <ul class="navbar-nav ml-auto"> --}}
{{-- <!-- Authentication Links --> --}}
{{-- @guest --}}
{{-- @if (Route::has('login')) --}}
{{-- <li class="nav-item"> --}}
{{-- <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
{{-- </li> --}}
{{-- @endif --}}

{{-- @if (Route::has('register')) --}}
{{-- <li class="nav-item"> --}}
{{-- <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
{{-- </li> --}}
{{-- @endif --}}
{{-- @else --}}

{{-- <li class="nav-item text-"> --}}
{{-- <a class="nav-link text-white" --}}
{{-- href="{{ route('usersurvey.index') }}">{{ __('Daftar Survei') }}</a> --}}
{{-- </li> --}}
{{-- <li class="nav-item"> --}}
{{-- <a class="nav-link text-white" --}}
{{-- href="{{ route('survey.index') }}">{{ __('Post Survei') }}</a> --}}
{{-- </li> --}}
{{-- @if (Auth::user()->isAdmin()) --}}
{{-- <li class="nav-item"> --}}
{{-- <a class="nav-link text-white" --}}
{{-- href="{{ route('admin.index') }}">{{ __('Admin Page') }}</a> --}}
{{-- </li> --}}
{{-- <li class="nav-item"> --}}
{{-- <a class="nav-link text-white" --}}
{{-- href="{{ route('mail.index') }}">{{ __('Blast Email') }}</a> --}}
{{-- </li> --}}
{{-- @endif --}}
{{-- <li class="nav-item dropdown"> --}}
{{-- <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" --}}
{{-- data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> --}}
{{-- {{ Auth::user()->username }} --}}
{{-- </a> --}}

{{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> --}}
{{-- <a class="dropdown-item" href="{{ route('user.index') }}"> --}}
{{-- Profile --}}
{{-- </a> --}}

{{-- <a class="dropdown-item" href="{{ route('pointlog.index') }}"> --}}
{{-- Riwayat Poin --}}
{{-- </a> --}}

{{-- <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> --}}
{{-- {{ __('Logout') }} --}}
{{-- </a> --}}

{{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" --}}
{{-- class="d-none"> --}}
{{-- @csrf --}}
{{-- </form> --}}
{{-- </div> --}}
{{-- </li> --}}
{{-- @endguest --}}
{{-- </ul> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </nav> --}}

{{-- <main class="py-4 "> --}}
{{-- @yield('content') --}}
{{-- </main> --}}
{{-- </div> --}}

{{-- <footer class="navbar bg-primary text-center" style="color:white; position:fixed; bottom: 0;  width:100%;"> --}}
{{-- <div style="float: left"> --}}
{{-- © Copyright 2021 Survit --}}
{{-- </div> --}}
{{-- <div style="float: right"> --}}
{{-- Contact Person: <a href="https://wa.me/6289644655003" style="color:white" target="_blank">+62 89644655003</a> --}}
{{-- </div> --}}
{{-- </footer> --}}
{{-- </body> --}}

{{-- New UI Body --}}

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="" style="background:rgba(255,255,255, 0.5);">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <h1><a href="{{ route('usersurvey.index') }}" class="logo"><img style="height: 30px;"
                        src="/images/survit.png" alt=""></a></h1>
            <ul class="list-unstyled components mb-5 bg-ls ">
                @guest
                    @if (Route::has('login'))
                        <li class="active">
                            <a href="{{ route('register') }}" class="text-dark"><span
                                    class="fa fa-sign-in mr-3"></span>Register</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="active">
                            <a href="{{ route('login') }}" class="text-dark"><span
                                    class="fa fa-sign-in mr-3"></span>Login</a>
                        </li>
                    @endif
                @else
                    <li class="active">
                        <a href="{{ route('usersurvey.index') }}" class="text-dark"><span
                                class="fa fa-home mr-3"></span> Isi Survei</a>
                    </li>
                    {{-- <li>
                        <a href="#" class="text-dark"><span class="fa fa-user mr-3"></span> Dashboard</a>
                    </li> --}}
                    <li>
                        <a href="{{ route('survey.index') }}" class="text-dark"><span
                                class="fa fa-sticky-note mr-3"></span> Buat Survei</a>
                    </li>
                    <li>
                        <a href="/datashop" class="text-dark"><span
                                class="fa fa-shopping-cart mr-3"></span> Toko Data</a>
                    </li>
                    <li>
                        <a href="{{ route('pointlog.index') }}" class="text-dark"><span
                                class="fa fa-money mr-3"></span> Riwayat Poin</a>
                    </li>
                    @if (Auth::user()->isAdmin())
                        <li>
                            <a href="{{ route('admin.index', 1) }}" class="text-dark"><span
                                    class="fa fa-user mr-3"></span> Admin Page</a>
                        </li>
                    @endif
                    <li>
                        <a class="text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="fa fa-sign-out mr-3"></span> Log Out</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" --}} class="d-none">
                        @csrf
                    </form>
                @endguest
            </ul>
        </nav>
        @yield('content')
    </div>
    <script>
        (function ($) {

            "use strict";

            var fullHeight = function () {

                $('.js-fullheight').css('height', $(window).height());
                $(window).resize(function () {
                    $('.js-fullheight').css('height', $(window).height());
                });

            };
            fullHeight();

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });

        })(jQuery);

    </script>
</body>

</html>
