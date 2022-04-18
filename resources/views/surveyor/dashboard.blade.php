@extends('layouts.app')
@include('surveyor.modal.demographyModal')
@include('surveyor.modal.pointModal')
@section('content')

    {{-- Belum Isi Demografi --}}
    @if ($user->is_survey_avail == '0')
        <div class="container p-5 mt-5">
            <div class="row justify-content-center mt-5">
                <div class="col-md-8 mt-5">
                    <div class="glass panel mt-5 text-dark">
                        <div class="card-header fs-5 ">{{ __('Selamat Datang di Website Survey SurvIT!') }}</div>

                        <div class="card-body">

                            {{ __('Survey survey kami akan dibagikan menurut demografi pengguna') }}
                            {{ __('Jika anda ingin mengisi survey, mohon klik tombol untuk mengisi demografi terlebih dahulu ') }}
                            <br>
                            <a class="btn btn-primary mt-3" href="" data-toggle="modal" data-target="#demography">Isi
                                Demografi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        {{-- MOBILE --}}
        <div class="container-xxl p-5 d-md-none">
            {{-- <div class="col-4"></div> --}}
            {{-- <div class="col-md-3 glass pannel rounded-lg shadow-sm p-3 no-gutters">
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <h2 class="pt-2">POIN: {{ $user->point }}</h2>
                        @if ($upoint != 0)
                            <h2>POIN DIPROSES: {{ $upoint }}</h2>
                        @endif
                    </div>
                    <div class="col-4 text-center pt-1 my-auto">
                        <a class=" btn btn-primary text-white" data-toggle="modal" data-target="#getpoint">Ambil</a>
                    </div>
                </div>
            </div> --}}
            <div class="row justify-content-center">
                {{-- <div class="col-md-9"></div> --}}
                {{-- <div class="col-md-3 glass pannel rounded-lg shadow-sm p-3 no-gutters">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="">
                            <h2 class="pt-2">POIN: {{ $user->point }}</h2>
                            @if ($upoint != 0)
                                <h2>POIN DIPROSES: {{ $upoint }}</h2>
                            @endif
                        </div>
                        <div class="col-4 text-center pt-1 my-auto">
                            <a class=" btn btn-primary text-white" data-toggle="modal" data-target="#getpoint">Ambil</a>
                        </div>
                    </div>
                </div> --}}

                {{-- old ui isi demografi --}}
                {{-- @if ($user->is_survey_avail == '0') --}}
                {{-- <div class="container"> --}}
                {{-- <div class="row justify-content-center"> --}}
                {{-- <div class="col-md-8"> --}}
                {{-- <div class="card"> --}}
                {{-- <div class="card-header fs-5">{{ __('Selamat Datang di Website Survey SurvIT!') }}</div> --}}

                {{-- <div class="card-body"> --}}

                {{-- {{ __('Survey survey kami akan dibagikan menurut demografi pengguna') }} --}}
                {{-- {{ __('Jika anda ingin mengisi survey, mohon klik tombol untuk mengisi demografi terlebih dahulu ') }} --}}
                {{-- <br> --}}
                {{-- <a class="btn btn-primary" href="" data-toggle="modal" data-target="#demography">Isi --}}
                {{-- Demografi</a> --}}
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- @else --}}
                {{-- Old ui surveys list --}}
                {{-- <div class="col-md-8 mt-5 "> --}}
                {{-- <div class="bg-white text-center rounded-lg shadow d-none d-md-block" style=""> --}}
                {{-- old ui if survey empty --}}
                {{-- @if (count($surveys) < 1) --}}
                {{-- <div class="p-5"> --}}
                {{-- <h5>Maaf, tapi untuk saat ini belum terdapat survei yang tersedia. Silahkan coba cek --}}
                {{-- beberapa --}}
                {{-- saat --}}
                {{-- lagi.</h5> --}}
                {{-- </div> --}}
                {{-- @else --}}
                {{-- <h1 class="p-3">Daftar Survei</h1> --}}
                {{-- <table class="table table-striped" id="myTable"> --}}
                {{-- <thead> --}}
                {{-- <tr class="text-center"> --}}
                {{-- <th scope="col">Judul</th> --}}
                {{-- <th scope="col">Topik</th> --}}
                {{-- <th scope="col">Point</th> --}}
                {{-- <th scope="col">Link</th> --}}
                {{-- </tr> --}}
                {{-- </thead> --}}
                {{-- <tbody> --}}
                {{-- @foreach ($surveys as $survey) --}}
                {{-- <tr class="text-center"> --}}
                {{-- <td> --}}
                {{-- {{ $survey->title }} --}}
                {{-- </td> --}}
                {{-- <td> --}}
                {{-- @foreach ($survey->interests as $sinterest) --}}
                {{-- @if ($sinterest->interest == 'Tidak ada') --}}
                {{-- Umum --}}
                {{-- @else --}}
                {{-- {{ $sinterest->interest }} --}}
                {{-- @endif --}}
                {{-- @endforeach --}}
                {{-- </td> --}}
                {{-- <td> --}}
                {{-- {{ $survey->point }} --}}
                {{-- </td> --}}
                {{-- <td> --}}
                {{-- <form action="{{ route('fill', ['url' => $survey->url]) }}" method="GET" --}}
                {{-- enctype="multipart/form-data"> --}}
                {{-- @csrf --}}
                {{-- <button class="btn btn-primary" id="selesai" type="submit" --}}
                {{-- style="background-color: rgb(0,0,226);">Buka --}}
                {{-- </button> --}}
                {{-- </form> --}}
                {{-- </td> --}}
                {{-- </tr> --}}
                {{-- @endforeach --}}
                {{-- </tbody> --}}
                {{-- </table> --}}
                {{-- @endif --}}
                {{-- </div> --}}
                {{-- </div> --}}

                <div style="overflow-y:scroll; height:100vh;">
                    <div class="col-md-3 no-gutters">
                        <div class="row mb-4">
                            <div class="container bg-white shadow px-4 py-3" style="border-radius: 15px;">
                                <div class="d-flex flex-row justify-content-between">
                                    <div class="">
                                        <h5>Poin</h5>
                                    </div>
                                    <div class="">
                                        <div class="btn btn-primary text-white" data-toggle="modal" data-target="#getpoint">
                                            Ambil
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h2>{{ $user->point }}</h2>
                                </div>
                                <div>
                                    Poin Diproses: {{ $upoint }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (count($surveys) < 1)
                        <div class="p-4 mt-4 glass pannel rounded-lg shadow-sm">
                            <p class="text-dark">Maaf, tapi untuk saat ini belum terdapat survei yang tersedia.
                                Silahkan coba cek beberapa
                                saat lagi.
                            </p>
                        </div>
                    @else
                        <div class="container-fluid p-2 mb-5">
                            <div class="container bg-white shadow p-2 mb-4" style="border-radius: 15px;">
                                <h4 class="text-center">Daftar Survei</h4>
                            </div>
                            @foreach ($surveys as $survey)
                                <div class="card-list w-100 no-gutters d-md-none ">
                                    <div class="container bg-white no-gutters shadow pr-4 pl-4 pt-4 pb-3 mb-4"
                                        style="border-radius: 15px;">
                                        <div class="row">
                                            <div class="col-8">
                                                <h5 class="font-weight-bolder">
                                                    {{ $survey->title }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-8">
                                                @foreach ($survey->interests as $sinterest)
                                                    @if ($sinterest->interest == 'Tidak ada')
                                                        Umum
                                                    @else
                                                        {{ $sinterest->interest }}
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="row mt-2 ">
                                            <div class="col-5 mt-1 ">
                                                <i class="fas fa-coins mr-1"></i>
                                                {{ $survey->point }}
                                            </div>
                                            <div class="col-7 no-gutters text-right">
                                                <div class="row">
                                                    <div class="no-gutters text-right ">
                                                        <form action="{{ route('fill', ['url' => $survey->url]) }}"
                                                            method="GET" enctype="multipart/form-data">
                                                            @csrf
                                                            <button class="btn btn-primary" id="selesai" type="submit"
                                                                style="background-color: rgb(0,0,226);">Buka
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>


        {{-- DESKTOP --}}
        <div id="content" class=" p-md-5 pt-5 d-none d-md-block">
            <div class="row">
                <div class="col-9">
                    <div class="panel mr-3 px-4 py-3 glass shadow " style="height:680px;">
                        <h5 class="">Daftar Survei</h5>
                        <div class="table-responsive custom-table-responsive" style="overflow: auto; height:620px;">

                            <table class="table custom-table">
                                <thead>
                                    <tr class="text-left">
                                        <th scope="col">Judul</th>
                                        <th scope="col">Topik</th>
                                        <th scope="col">Poin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($surveys as $survey)
                                        <tr data-href="{{ route('fill', ['url' => $survey->url]) }}" method="GET"
                                            enctype="multipart/form-data" scope="row">
                                            <td>{{ $survey->title }}</td>
                                            <td>
                                                @foreach ($survey->interests as $sinterest)
                                                    @if ($sinterest->interest == 'Tidak ada')
                                                        Umum
                                                    @else
                                                        {{ $sinterest->interest }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td> {{ $survey->point }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="col-3">
                    <div class="row mb-4">
                        <div class=" panel glass shadow px-4 py-3">
                            <div class="d-flex flex-row justify-content-between">
                                <div class="">
                                    <h5>Poin</h5>
                                </div>
                                <div class="">
                                    <div class="btn btn-primary text-white" data-toggle="modal" data-target="#getpoint">
                                        Ambil</div>
                                </div>
                            </div>
                            <div class="row">
                                <h2>{{ $user->point }}</h2>
                            </div>
                            <div>
                                Poin Diproses: {{ $upoint }}
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="panel glass shadow px-4 py-3">
                            <div class="row">
                                <h5>Berita</h5>
                            </div>
                            <div class="row px-3 py-2">
                                <small class="text-dark">Hai selamat datang di website Survit. Kamu bisa mengisi survei
                                    atau membuat
                                    survei sesuai kesukaan Kamu. Jika Kamu butuh bantuan silahkan menghubungi Kami melalui
                                    WhatsApp
                                    <a href="https://api.whatsapp.com/send?phone=6285158909371&text=Hai%20Tim%20Survit!"
                                        class="underline">di sini.</a>
                                </small>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('user.index') }}">
                        <div class="row">
                            <div class="panel glass shadow  px-4 py-3">
                                <div class="row">
                                    <div class="col-3 ">
                                        <img src="/images/profile.png" alt="" style="width:100%">
                                    </div>
                                    <div class="col-6">
                                        <div class="row text-start">
                                            {{ Auth::user()->username }}
                                        </div>
                                        <div class="row">
                                            <small class="pl-0">{{ Auth::user()->email }}</small>
                                        </div>
                                    </div>
                                    <div class="col-3 "></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    @endif

    <script>
        $(document).ready(function() {
            $(document.body).on("click", "tr[data-href]", function() {
                window.location.href = this.dataset.href;
            });
        });
    </script>
    <script>
        $('input[type=checkbox]').change(function(e) {
            if ($('input[type=checkbox]:checked').length > 3) {
                $(this).prop('checked', false)
                alert("Kamu hanya dapat memilih maksimal 3");
            }
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#checkBtn').click(function() {
                checked = $("input[type=checkbox]:checked").length;

                if (!checked) {
                    alert("Kamu harus memilih minimal 1");
                    return false;
                }

            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#pay').click(function() {
                var x, y;
                x = document.getElementById("nominal").value;
                y = document.getElementById("upoint").value;
                // if (isNaN(x) || x < y) {
                if (isNaN(x) || 10000 > y) {
                    alert(
                        "Point kamu tidak cukup."
                    );
                    return false;
                }

            });
        });
    </script>

@endsection
