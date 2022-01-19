@extends('layouts.app')
@section('content')
    <div class="container-xxl p-5">
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
@endsection
