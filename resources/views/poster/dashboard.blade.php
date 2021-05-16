@extends('layouts.app')

@section('content')
    @include('poster.modal.createModal')
    @include('poster.modal.editModal')


@if( Auth::user()->is_admin == '1' )
<div class="container-fluid">

    <div class="p-5">
        <div class="row">
            <div class="col-md-10 text-right">
                <a href="" data-toggle="modal" data-target="#createsurvey" class="btn btn-primary ">Buat Survey</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-2"></div>
            <div class="col-sm-8 text-center bg-danger">
                <div class="rounded bg-danger">

                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Status</th>
                                <th scope="col">Link</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surveys as $survey)
                                <tr>
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#editsurvey"> {{ $survey->title }}</a>
                                    </td>
                                    <td>
                                        {{-- {{ $survey->pay / $survey->limit }}pt --}}
                                    </td>
                                    <td>
                                        <a href="{{ $survey->link }}" class="btn btn-primary" >Open</a>
                                    </td>
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#editsurvey" class="btn btn-primary ">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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

                        <a class="btn btn-primary" target="_blank" href="https://surv-it.web.app/#Footer">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
