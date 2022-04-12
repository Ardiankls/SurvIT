@extends('layouts.app')
@include('surveyor.modal.demographyModal')
@include('surveyor.modal.pointModal')
@section('content')

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
        <div class="container-xxl p-5 d-md-none">
            <div class="row justify-content-center ">
                <div class="col-md-9"></div>

            {{--old ui point--}}
            <div class="col-md-3 bg-white rounded-lg shadow-sm p-3 no-gutters">
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
            </div>

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

               {{-- Old UI Mobile Survey list --}}
                <div class="container-fluid p-2 d-md-none mb-4 " style="overflow-y: scroll; border-radius: 15px;">
                    @if (count($surveys) < 1)
                        <h5>Maaf, tapi untuk saat ini belum terdapat survei yang tersedia. Silahkan coba cek beberapa
                            saat
                            lagi.</h5>
                    @else
                        <div class="container bg-white  shadow p-2 d-md-none mb-4" style="border-radius: 15px;">
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
                                        <div class="col-7 no-gutters text-right ">
                                            <div class="row">
                                                <div class="col-6 no-gutters text-right ">
                                                </div>
                                                <div class="col-6 no-gutters text-right ">
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
                    @endif
                </div>
                {{-- @endif --}}
            </div>
        </div>

        <div id="content" class=" p-md-5 pt-5 d-none d-md-block">
            <!-- <h2 class="mb-4">Sidebar #04</h2> -->
            <div class="row">
                <div class="col-9">
                    <div class="panel mr-3 px-4 py-3 glass shadow " style="height:680px;">
                        <h5 class="">Survey list</h5>
                        <div class="table-responsive custom-table-responsive" style="overflow: auto; height:620px;">

                            <table class="table custom-table">
                                <thead>
                                    <tr>
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
                                    <div class="btn btn-primary text-white" data-toggle="modal" data-target="#getpoint">Ambil</div>
                                </div>
                            </div>
                            <div class="row">
                                <h2>{{ $user->point }}</h2>
                            </div>

                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="panel glass shadow px-4 py-3">
                            <div class="row">
                                <h5>News</h5>
                            </div>
                            <div class="row px-3 py-2">
                                <small class="text-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Vivamus eu mauris elementum, vulputate magna id, maximus dolor. Curabitur accumsan
                                    mollis lectus nec ultrices. Nulla facilisi. Aliquam consectetur cursus justo sit
                                    amet dapibus. Curabitur egestas arcu urna, accumsan luctus lectus dignissim quis.
                                    Maecenas faucibus convallis magna, et lacinia neque congue vel. In pulvinar laoreet
                                    semper. Proin sit amet pulvinar turpis, at tristique massa. Vivamus lacinia dolor at
                                    lacus consectetur egestas. Morbi auctor elit et ante congue dignissim. Nam laoreet
                                    nulla nec felis bibendum tristique.</small>
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
