@extends('layouts.app')

@section('content')
    @include('poster.modal.createModal')

    @if (Auth::user()->is_admin == '1')
        <div class="container-fluid" >

            <div class="p-5">
                <div class="row">
                    <div class="col-md-10 text-right">
                        <a href="" data-toggle="modal" data-target="#createsurvey" class="btn btn-primary ">Buat Survey</a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center ">
                <div class="col-md-8 mt-5 ">
                    <div class="bg-white text-center rounded-lg shadow d-none d-md-block" style="">
                        <h1 class="p-3">Survey Saya</h1>
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Judul</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Deposit</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Count</th>
                                    <th scope="col">Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($surveys as $survey)
                                    <tr>
                                        <td>
                                            <a href="" data-toggle="modal" data-target="#editsurvey">
                                                {{ $survey->title }}</a>
                                        </td>
                                        <td>
                                            Berbayar
                                        </td>
                                        <td>
                                            {{ $survey->pay }}
                                        </td>
                                        <td>
                                            @if($survey->count < $survey->limit)
                                                Dipublikasikan
                                            @else
                                                Ditutup
                                            @endif
                                        </td>
                                        <td>
                                            {{ $survey->count }}
                                        </td>
                                        <td>
                                            <a href="{{ $survey->link }}" target="_blank" class="btn btn-primary">Open</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
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
    @endif
@endsection
