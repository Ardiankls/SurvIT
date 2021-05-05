@extends('layouts.app')
@include('surveyor.modal.demographyModal')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    @if ($user->is_survey_avail == '0')
                        <a href="" data-toggle="modal" data-target="#demography" class="btn btn-primary ">Isi Demografi terlebih dahulu</a>
                    @else
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Interest</th>
                                    <th scope="col">Point</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($surveys as $survey)
                                    <tr>
                                        <td>
                                            {{ $survey->title }}
                                        </td>
                                        <td>
                                            {{ $survey->link }}
                                        </td>
                                        <td>
                                            {{ $survey->interest->interest }}
                                        </td>
                                        <td>
                                            {{ $survey->pay / $survey->limit }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>

            </div>
        </div>
    </div>
@endsection
