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
                        <h1>Point {{ $user->point }}</h1>
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Topik</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Point</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($surveys as $survey)
                                    <?php
                                        $sinterests = $survey->interests;
                                        $sjobs = $survey->jobs;
                                        $sgender = $survey->gender_id;
                                        $sprovinces = $survey->provinces;
                                    ?>
                                    @foreach ($sinterests as $sinterest)
                                    @endforeach
                                    @foreach ($sjobs as $sjob)
                                    @endforeach
                                    @foreach ($sprovinces as $sprovince)
                                    @endforeach
                                    @foreach ($uinterests as $uinterest)
                                    @endforeach
                                    @foreach ($ujobs as $ujob)
                                    @endforeach
                                    @foreach ($uprovinces as $uprovince)
                                    @endforeach

                                    @if ($sgender == $ugender || $sgender == '1')
                                        @if ($sinterest->pivot->interest_id == $uinterest->pivot->interest_id || $sinterest->pivot->interest_id == '1')
                                            @if ($sjob->pivot->job_id == $ujob->pivot->job_id || $sjob->pivot->job_id == '1')
                                                @if ($sprovince->pivot->province_id == $uprovince->pivot->province_id || $sprovince->pivot->province_id == '1')
                                                <tr>
                                                    <td>
                                                        {{ $survey->title }}
                                                    </td>
                                                    <td>
                                                        @if($sinterest->interest == 'Tidak ada')
                                                            Umum
                                                        @endif
                                                    </td>
                                                    <td>
                                                            {{-- @foreach($usurveys as $surv)
                                                                    @if($surv->survey_id == $survey->id)
                                                                        {{$surv}}
                                                                        @if($surv != null)
                                                                            @if($surv->status == 2)
                                                                                Proses
                                                                            @elseif($surv->status == 3)
                                                                                Sukses
                                                                            @endif
                                                                        @else
                                                                            Baru
                                                                        @endif                                                                    @endif

                                                            @endforeach --}}
                                                            @if($survey->users != null)
                                                                @foreach($survey->users as $usurveyy)
                                                                    @if($usurveyy->pivot->user_id == $user->id)
                                                                        @if($usurveyy->exists())
                                                                            @if($usurveyy->pivot->status == 2)
                                                                                Proses
                                                                            @elseif($usurveyy->pivot->status == 3)
                                                                                Sukses
                                                                            @endif
                                                                        @else
                                                                            Baru
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                Baru
                                                            @endif
                                                    </td>
                                                    <td>
                                                        {{ $survey->pay / $survey->limit }}pt
                                                    </td>
                                                    <td>
                                                        <a href={{ $survey->link }} target="_blank" class="btn btn-primary">Buka</a>
                                                    </td>
                                                    <td>
                                                        {{-- @if($survey->users != null)
                                                            @if($usurveyy->pivot->user_id == $user->id)
                                                                -
                                                            @else --}}
                                                                <form action="{{ route('usersurvey.update', $survey) }}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input name="_method" type="hidden" value="PATCH">
                                                                    <button class="btn btn-primary" type="submit" style="background-color: rgb(221,177,226);">Selesai
                                                                    </button>
                                                                </form>
                                                            {{-- @endif
                                                        @endif --}}
                                                    </td>
                                                </tr>
                                                @endif
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
