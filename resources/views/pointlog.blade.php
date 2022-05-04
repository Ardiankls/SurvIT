@extends('layouts.app')
@include('surveyor.modal.pointModal')
@section('content')
    {{-- MOBILE --}}
    <div class="container-xxl p-5 d-md-none">
        <div class="row justify-content-center">
            <div style="overflow-y:scroll; height:100vh;">
                <div class="col-md-3 no-gutters">
                    <div class="row mb-4">
                        <div class="container bg-white shadow px-4 py-3" style="border-radius: 15px;">
                            <div class="d-flex flex-row justify-content-between">
                                <div class="">
                                    <h5>Poin</h5>
                                </div>
                                <div class="">
                                    <div class="btn btn-primary text-white" data-toggle="modal" data-target="#getpoint">Ambil
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
                <div class="container-fluid p-2 mb-5">
                    <div class="container bg-white shadow p-2 mb-4" style="border-radius: 15px;">
                        <h4 class="text-center">Riwayat Poin</h4>
                    </div>
                    @foreach ($pointlogs as $pointlog)
                        <div class="card-list w-100 no-gutters d-md-none ">
                            <div class="container bg-white no-gutters shadow pr-4 pl-4 pt-4 pb-3 mb-4"
                                style="border-radius: 15px;">
                                <div class="row">
                                    <div class="col-11">
                                        <h5 class="font-weight-bolder">
                                            @if ($pointlog->type == 0)
                                                @if ($pointlog->user_survey != null)
                                                    Mengisi survei "{{ $pointlog->usersurvey->survey->title }}"
                                                @else
                                                    {{ $pointlog->usercampaign->campaign->description }}
                                                @endif
                                            @elseif($pointlog->type == 1)
                                                Pengambilan poin
                                            @endif
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-11">
                                        {{ $pointlog->status->status }}
                                    </div>
                                </div>
                                <div class="row mt-2 ">
                                    <div class="col-5 mt-1 ">
                                        {{-- {{ $survey->count }} / {{ $survey->package->respondent }} --}}
                                    </div>
                                    <div class="col-7 no-gutters text-right ">
                                        <div class="row">
                                            <div class="col-6 no-gutters text-right ">
                                            </div>
                                            <div class="col-6 no-gutters text-right ">
                                                @if ($pointlog->type == 0)
                                                    +
                                                    {{ $pointlog->point }}
                                                @elseif($pointlog->type == 1)
                                                    -
                                                    {{ $pointlog->point }}
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
            <div class="col-md-9"></div>
            <div class="col-md-3 no-gutters">
                <div class="row mb-4">
                    <div class="panel glass shadow px-4 py-3">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
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
            </div>
            <div class="col-md-9 mt-3 glass rounded shadow">
                <div class="text-center rounded-lg d-none d-md-block" style="">
                    <h1 class="p-3">Riwayat Poin</h1>
                    <table class="table custom-table" id="myTable">
                        <thead>
                            <tr class="text-left">
                                <th scope="col">Keterangan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Poin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pointlogs as $pointlog)
                                <tr class="text-left">
                                    <td>
                                        @if ($pointlog->type == 0)
                                            @if ($pointlog->user_survey != null)
                                                Mengisi survei "{{ $pointlog->usersurvey->survey->title }}"
                                            @else
                                                {{ $pointlog->usercampaign->campaign->description }}
                                            @endif
                                        @elseif($pointlog->type == 1)
                                            Pengambilan poin
                                        @endif
                                    </td>
                                    <td>
                                        {{ $pointlog->status->status }}
                                    </td>
                                    <td>
                                        @if ($pointlog->type == 0)
                                            +
                                            {{ $pointlog->point }}
                                        @elseif($pointlog->type == 1)
                                            -
                                            {{ $pointlog->point }}
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#pay').click(function() {
                var x, y;
                x = document.getElementById("nominal").value;
                y = document.getElementById("upoint").value;
                if (10000 > parseInt(y) || parseInt(x) > parseInt(y)) {
                    alert(
                        "Point kamu tidak cukup."
                    );
                    return false;
                }
                if (10000 > parseInt(x)) {
                    alert(
                        "Minimal penarikan poin 10000."
                    );
                    return false;
                }

            });
        });
    </script>

@endsection
