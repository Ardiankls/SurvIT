@extends('layouts.app')
@include('poster.modal.createModal')
@section('content')
    {{-- @if (Auth::user()->is_admin == '1') --}}
    <div class="container-xxl p-5">
        <div class="col-md-10 text-right">
            <a href="" data-toggle="modal" data-target="#createsurvey" class="btn btn-primary ">Buat Survey</a>
        </div>
        <div class="row justify-content-center ">
            <div class="col-md-8 mt-5 ">
                <div class="bg-white text-center rounded-lg shadow d-none d-md-block" style="">
                    <h1 class="p-3">Survey Saya</h1>
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
                                        @if ($survey->count < $survey->package->respondent)
                                            Dibuka
                                        @else
                                            Ditutup
                                        @endif
                                    </td>
                                    <td>
                                        {{ $survey->count }} / {{ $survey->package->respondent }}
                                    </td>
                                    <td>
                                        @if ($survey->status_id == 1 || $survey->status_id == 2)
                                            <a href="{{ route('survey.edit', $survey) }}" class="btn btn-primary">Ubah</a>
                                        @elseif($survey->status_id == 3)
                                            <a href="{{ route('survey.edit', $survey) }}" class="btn btn-primary">Detail</a>
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
            </div>
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
@endsection
