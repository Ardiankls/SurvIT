@extends('layouts.app')
@include('poster.modal.createModal')
@section('content')
    @foreach ($surveys as $survey)
        @include('poster.modal.payModal')
    @endforeach

    {{-- MOBILE --}}
    <div class="container-xxl p-5 d-md-none">
        <div class="row justify-content-center">
            <div style="overflow-y:scroll; height:100vh;">
                <div class="container-fluid p-2 mb-5">
                    <div class="text-right mb-3">
                        <a href="" data-toggle="modal" data-target="#createsurvey" class="btn btn-primary ">Buat Survey</a>
                    </div>
                    <div class="container bg-white shadow p-2 mb-4" style="border-radius: 15px;">
                        <h4 class="text-center">Survei Saya</h4>
                    </div>
                    @foreach ($surveys as $survey)
                        {{-- @include('poster.modal.payModal') --}}
                        <div class="card-list w-100 no-gutters">
                            <div class="container bg-white no-gutters shadow pr-4 pl-4 pt-4 pb-3 mb-4"
                                style="border-radius: 15px;">
                                <div class="row">
                                    <div class="col-11">
                                        <h5 class="font-weight-bolder">
                                            {{ $survey->title }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 text-dark">
                                        {{ $survey->package->description }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10">
                                        @if ($survey->status_id == '3')
                                            @if ($survey->count < $survey->package->respondent)
                                                Dibuka
                                            @else
                                                Ditutup
                                            @endif
                                        @else
                                            {{ $survey->status->status }}
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-2 ">
                                    <div class="col-5 mt-1 ">
                                        {{ $survey->count }} / {{ $survey->package->respondent }}
                                    </div>
                                    <div class="col-7 no-gutters text-right">
                                        <div class="row">
                                            <div class="no-gutters text-right">
                                                @if ($survey->status_id == 1 || $survey->status_id == 2)
                                                    <a href="{{ route('survey.edit', $survey) }}"
                                                        class="btn btn-primary" style="background-color: rgb(0,0,226);">Ubah</a>
                                                @elseif($survey->status_id == 3)
                                                    <a href="{{ route('survey.edit', $survey) }}"
                                                        class="btn btn-primary" style="background-color: rgb(0,0,226);">Detail</a>
                                                @elseif($survey->status_id == 4)
                                                    <a href="" class="btn btn-primary" style="background-color: rgb(0,0,226);" data-toggle="modal"
                                                        data-target="#pay-{{ $survey->id }}">Bayar</a>
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- DESKTOP --}}
    <div class="container-xxl p-5 d-none d-md-block">
        <div class="row justify-content-center ">
            <div class="col-md-9 text-right mb-3 mr-4">
                <a href="" data-toggle="modal" data-target="#createsurvey" class="btn btn-primary">Buat Survey</a>
            </div>
            <div class="col-9">
                <div class="panel mr-3 px-4 py-3 glass shadow" style="height:630px;">
                    <h5 class="">Survei Saya</h5>
                    <div class="table-responsive custom-table-responsive" style="overflow: auto; height:620px;">
                        <table class="table custom-table">
                            <thead>
                                <tr class="text-left">
                                    <th scope="col">Judul</th>
                                    <th scope="col">Paket</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($surveys as $survey)

                                    <tr data-href="{{ route('fill', ['url' => $survey->url]) }}" method="GET"
                                        enctype="multipart/form-data" scope="row">
                                        <td>
                                            {{ $survey->title }}
                                        </td>
                                        <td>
                                            {{ $survey->package->description }}
                                        </td>
                                        <td>
                                            @if ($survey->status_id == '3')
                                                @if ($survey->count < $survey->package->respondent)
                                                    Dibuka
                                                @else
                                                    Ditutup
                                                @endif
                                            @else
                                                {{ $survey->status->status }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $survey->count }} / {{ $survey->package->respondent }}
                                        </td>
                                        <td>
                                            @if ($survey->status_id == 1 || $survey->status_id == 2)
                                                <a href="{{ route('survey.edit', $survey) }}"
                                                    class="btn btn-primary" style="background-color: rgb(0,0,226);">Ubah</a>
                                            @elseif($survey->status_id == 3)
                                                <a href="{{ route('survey.edit', $survey) }}"
                                                    class="btn btn-primary" style="background-color: rgb(0,0,226);">Detail</a>
                                            @elseif($survey->status_id == 4)
                                                <div class="btn btn-primary" style="background-color: rgb(0,0,226);" data-toggle="modal"
                                                    data-target="#pay-{{ $survey->id }}">Bayar</div>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            {{-- <div class="col-md-8 mt-5 ">
                <div class="text-center rounded-lg shadow d-md-block glass panel" style="">
                    <h1 class="p-3">Survei Saya</h1>
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Judul</th>
                                <th scope="col">Paket</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surveys as $survey)
                                <tr class="text-center">
                                    <td>
                                        {{ $survey->title }}
                                    </td>
                                    <td>
                                        {{ $survey->package->description }}
                                    </td>
                                    <td>
                                        @if ($survey->status_id == '3')
                                            @if ($survey->count < $survey->package->respondent)
                                                Dibuka
                                            @else
                                                Ditutup
                                            @endif
                                        @else
                                            {{ $survey->status->status }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $survey->count }} / {{ $survey->package->respondent }}
                                    </td>
                                    <td>
                                        @if ($survey->status_id == 1 || $survey->status_id == 2)
                                            <a href="{{ route('survey.edit', $survey) }}"
                                                class="btn btn-primary">Ubah</a>
                                        @elseif($survey->status_id == 3)
                                            <a href="{{ route('survey.edit', $survey) }}"
                                                class="btn btn-primary">Detail</a>
                                        @elseif($survey->status_id == 4)
                                            <a href="" class="btn btn-primary" data-toggle="modal"
                                                data-target="#pay-{{ $survey->id }}">Bayar</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>

                                @include('poster.modal.payModal')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> --}}
        </div>
    </div>
    {{-- @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Coming Soon') }}</div>

                        <div class="card-body">

                            {{ __('Fitur ini akan segera kami luncurkan setelah melewati proses testing dan jumlah user ') }}
                            {{ __('Jika ingin membuat survey, dapat menghubungi pada kontak yang kami sediakan ') }}

                            <a target="_blank" href="https://surv-it.web.app/#Footer">Hubungi Kami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif --}}

     {{-- Age --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#create').click(function() {
                var x, y;
                x = document.getElementById("agefrom").value;
                y = document.getElementById("ageto").value;
                if (parseInt(x) > parseInt(y)) {
                    alert(
                        "Ada kesalahan di demografi usia."
                    );
                    return false;
                }
                if (parseInt(x) > 99 || parseInt(y) > 99) {
                    alert(
                        "Usia tidak boleh lebih dari 100."
                    );
                    return false;
                }
            });
        });
    </script>

@endsection
