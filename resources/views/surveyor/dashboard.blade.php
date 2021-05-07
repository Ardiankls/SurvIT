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
                        <a href="" data-toggle="modal" data-target="#demography" class="btn btn-primary ">Isi Demografi
                            terlebih dahulu</a>
                    @else
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Point</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($surveys as $survey)
                                    <?php
                                        $sinterests = $survey->interests;
                                        $sjobs = $survey->jobs;
                                        $sgender = $survey->gender_id;
                                    ?>
                                    @foreach ($sinterests as $sinterest)
                                    @endforeach
                                    @foreach ($sjobs as $sjob)
                                    @endforeach
                                    @foreach ($uinterests as $uinterest)
                                    @endforeach
                                    @foreach ($ujobs as $ujob)
                                    @endforeach

                                    @if ($sgender == $ugender)
                                        @if ($sinterest->pivot->interest_id == $uinterest->pivot->interest_id)
                                            @if ($sjob->pivot->job_id == $ujob->pivot->job_id)
                                                <tr>
                                                    <td>
                                                        {{ $survey->title }}
                                                    </td>
                                                    <td>
                                                        {{ $survey->link }}
                                                    </td>
                                                    <td>
                                                        {{ $survey->pay / $survey->limit }}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif
                                    @endif

                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>

            </div>
        </div>
    </div>
@endsection
