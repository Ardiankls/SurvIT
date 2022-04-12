@extends('layouts.app')
@include('surveyor.modal.pointModal')
@section('content')
    <div class="container-xxl p-5" style="overflow-y:scroll; height:100vh">
        <div class="row justify-content-center ">
            <div class="col-md-9"></div>
            <div class="col-md-3 no-gutters">
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
            </div>

            <div class="col-md-8 mt-5 ">
                <div class="bg-white text-center rounded-lg shadow d-none d-md-block" style="">
                    <h1 class="p-3">Riwayat Poin</h1>
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Keterangan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Poin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pointlogs as $pointlog)
                                <tr class="text-center">
                                    <td>
                                        @if($pointlog->type == 0)
                                            Mengisi survei "{{ $pointlog->usersurvey->survey->title }}"
                                        @elseif($pointlog->type == 1)
                                            Pengambilan poin
                                        @endif
                                    </td>
                                    <td>
                                        {{ $pointlog->status->status }}
                                    </td>
                                    <td>
                                        @if($pointlog->type == 0)
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
