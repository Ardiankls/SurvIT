<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Easy Survey For Your Business"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SurvIT') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">


</head>
<body>
<div class="container-fluid vh-100">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12 vh-100 bg-danger text-center p-5" id="gradient">
                    <div class="container-sm mt-5 ">
                        <img class="logo w-75 mt-5" src="{{ asset('assets/assets/logo/logoWhite.svg') }}" alt="">
                        <p class="mt-5 font-weight-bold text-white"> Mari Ikut Serta Mendorong Perkembangan UMKM dan
                            Bisnis Di Indonesia Hanya Dengan Mengisi Survey</p>
                    </div>
                </div>
            </div>
        </div>

        @yield('content2')

    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-8">

    </div>
</div>
</body>
</html>
