@extends('layouts.app')
@include('surveyor.modal.demographyModal')
@include('surveyor.modal.pointModal')
@section('content')
    <div class="container-xxl  p-5">
        <div class="row justify-content-center ">
            <div class="col-md-9"></div>
            <div class="col-md-3 bg-white rounded-lg shadow-sm p-3 no-gutters">
                <div class="row">
                    <div class="col-8">
                        <h2 class="pt-2">POINT: {{ $user->point }}</h2>
                    </div>
                    <div class="col-4 text-center pt-1">
                        <a class=" btn btn-primary" data-toggle="modal" data-target="#getpoint">Ambil</a>
                    </div>
                </div>
            </div>

            @if ($user->is_survey_avail == '0')
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header fs-5">{{ __('Selamat Datang di Website Survey SurvIT!') }}</div>

                                <div class="card-body">

                                    {{ __('Survey survey kami akan dibagikan menurut demografi pengguna') }}
                                    {{ __('Jika anda ingin mengisi survey, mohon klik tombol untuk mengisi demografi terlebih dahulu ') }}
                                    <br>
                                    <a class="btn btn-primary" href="" data-toggle="modal" data-target="#demography">Isi
                                        Demografi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @else
                <div class="col-md-8 mt-5 ">
                    <div class="bg-white text-center rounded-lg shadow d-none d-md-block" style="">
                        @if (count($surveys) < 1)
                        <div class="p-5">
                            <h5>Maaf, tapi untuk saat ini belum terdapat survei yang tersedia. Silahkan coba cek
                                beberapa
                                saat
                                lagi.</h5>
                            </div>
                        @else
                            <h1 class="p-3">Daftar Survei</h1>
                            <table class="table table-striped" id="myTable">
                                <thead>
                                <tr class="text-center">
                                    <th scope="col">Judul</th>
                                    <th scope="col">Topik</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Point</th>
                                    <th scope="col">Link</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($surveys as $survey)
                                    <?php
                                    $sinterests = $survey->interests;
                                    $checks = $survey
                                        ->users()
                                        ->wherePivot('user_id', '=', $user->id)
                                        ->wherePivot('status', '<>', 1)
                                        ->get();
                                    ?>
                                    <tr class="text-center">
                                        <td>
                                            {{ $survey->title }}
                                        </td>
                                        <td>
                                            @foreach ($sinterests as $sinterest)
                                                @if ($sinterest->interest == 'Tidak ada')
                                                    Umum
                                                @else
                                                    {{ $sinterest->interest }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @if (count($checks) > 0)
                                                @foreach ($checks as $usurvey)
                                                    @if ($usurvey->pivot->status == 3)
                                                        Sukses
                                                    @else
                                                        Pending
                                                    @endif
                                                @endforeach
                                            @else
                                                Dibuka
                                            @endif
                                        </td>
                                        <td>
                                            @if ($survey->pay != null)
                                                {{ $survey->pay }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                        <td>
                                            @if (count($checks) > 0)
                                                -
                                            @else
                                                <form action="{{ route('fill', $survey) }}" method="GET"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    <button class="btn btn-primary" id="selesai" type="submit"
                                                            style="background-color: rgb(0,0,226);">Buka
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>

                <div class="container-fluid p-2 d-md-none mb-4" style="border-radius: 15px;">
                    @if (count($surveys) < 1)
                        <h5>Maaf, tapi untuk saat ini belum terdapat survei yang tersedia. Silahkan coba cek beberapa
                            saat
                            lagi.</h5>
                    @else
                        <div class="container bg-white  shadow p-2 d-md-none mb-4" style="border-radius: 15px;">
                            <h4 class="text-center">Daftar Survei</h4>
                        </div>

                        @foreach ($surveys as $survey)
                            <?php
                            $sinterests = $survey->interests;
                            $checks = $survey
                                ->users()
                                ->wherePivot('user_id', '=', $user->id)
                                ->wherePivot('status', '<>', 1)
                                ->get();
                            ?>
                            <div class="card-list w-100 no-gutters d-md-none ">
                                <div class="container bg-white no-gutters shadow pr-4 pl-4 pt-4 pb-3 mb-4"
                                     style="border-radius: 15px;">
                                    <div class="row">
                                        <div class="col-8">
                                            <h5 class="font-weight-bolder">
                                                {{ $survey->title }}
                                            </h5>
                                        </div>
                                        <div class="col-4 text-right">
                                            <div class="">Status:</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            @foreach ($sinterests as $sinterest)
                                                @if ($sinterest->interest == 'Tidak ada')
                                                    Umum
                                                @else
                                                    {{ $sinterest->interest }}
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-4 text-right text-warning">
                                            @if (count($checks) > 0)
                                                @foreach ($checks as $usurvey)
                                                    @if ($usurvey->pivot->status == 3)
                                                        Sukses
                                                    @else
                                                        Pending
                                                    @endif
                                                @endforeach
                                            @else
                                                Dibuka
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mt-2 ">
                                        <div class="col-5 mt-1 ">
                                            <i class="fas fa-coins mr-1"></i>
                                            @if ($survey->pay != null)
                                                {{ $survey->pay }}
                                            @else
                                                0
                                            @endif
                                        </div>
                                        <div class="col-7 no-gutters text-right ">
                                            <div class="row">
                                                <div class="col-6 no-gutters text-right ">
                                                </div>
                                                <div class="col-6 no-gutters text-right ">
                                                    @if (count($checks) > 0)
                                                    @else
                                                        <form action="{{ route('fill', $survey) }}" method="GET"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <button class="btn btn-primary" id="selesai" type="submit"
                                                                    style="background-color: rgb(0,0,226);">Buka
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            @endif
        </div>
    </div>
    <script>
        $('input[type=checkbox]').change(function (e) {
            if ($('input[type=checkbox]:checked').length > 3) {
                $(this).prop('checked', false)
                alert("Kamu hanya dapat memilih maksimal 3");
            }
        })

    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#checkBtn').click(function () {
                checked = $("input[type=checkbox]:checked").length;

                if (!checked) {
                    alert("Kamu harus memilih minimal 1");
                    return false;
                }

            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#pay').click(function () {
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

    {{-- Boostrap 5 --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" --}}
        {{-- integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"> --}}
    {{-- </script> --}}
    {{-- jQuery --}}
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    {{-- DataTables --}}
    {{-- <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.js"></script> --}}
    {{-- <script>
        $(document).ready(function() {
            var thetable = $('#myTable').DataTable({});
        });
    </script> --}}

@endsection
