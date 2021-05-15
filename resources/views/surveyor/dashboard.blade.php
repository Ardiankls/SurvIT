@extends('layouts.app')
@include('surveyor.modal.demographyModal')
@section('content')
    <div class="container-xxl  p-5">
        <div class="row justify-content-center ">
            <div class="col-md-9"></div>
            <div class="col-md-3 bg-white rounded-lg shadow-sm p-3 no-gutters">
                <div class="row">
                    <div class="col-8">
                        <h2 class="pt-2">POINT: {{ $user->point }}</h2>
                    </div>
                    <div class="col-4 text-center pt-1">
                        <a class=" btn btn-primary">Ambil</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-5">
                <div class="bg-white text-center rounded-lg shadow" style="">
                    @if ($user->is_survey_avail == '0')
                        <a href="" data-toggle="modal" data-target="#demography" class="btn btn-primary ">Isi Demografi
                            terlebih dahulu</a>
                    @else
                        <h1 class="p-3">Survey List</h1>
                        <table class="table table-striped" id="myTable">
                            <thead>
                            <tr class="text-center">
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
                                                <tr class="text-center">
                                                    <td>
                                                        {{ $survey->title }}
                                                    </td>
                                                    <td>
                                                        @if($sinterest->interest == 'Tidak ada')
                                                            Umum
                                                        @else
                                                            {{ $sinterest->interest }}
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
                                                        {{-- {{ $survey->pay / $survey->limit }}pt --}}
                                                        0pt
                                                    </td>
                                                    <td>
                                                        <a href={{ $survey->link }} target="_blank"
                                                           class="btn btn-primary">Buka</a>
                                                    </td>
                                                    <td>
                                                        {{-- @if($survey->users != null)
                                                            @if($usurveyy->pivot->user_id == $user->id)
                                                                -
                                                            @else --}}
                                                        <form action="{{ route('usersurvey.update', $survey) }}"
                                                              method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="PATCH">
                                                            <button class="btn btn-primary" id="selesai" type="submit"
                                                                    style="background-color: rgb(221,177,226);">Selesai
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
    <script>
        $('input[type=checkbox]').change(function (e) {
            if ($('input[type=checkbox]:checked').length > 3) {
                $(this).prop('checked', false)
                alert("Kamu hanya dapat memilih maksimal 3");
            }
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#checkBtn').click(function () {
                checked = $("input[type=checkbox]:checked").length;

                if (!checked) {
                    alert("You must check at least one checkbox.");
                    return false;
                }

            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#selesai').click(function () {
                checked = $("input[type=checkbox]:checked").length;

                if (!checked) {
                    alert("Kami akan melakukan pengecekan validasi survey anda, apabila pengisian survey sudah valid. Maka status akan berubah menjadi Sukses. Klik Ok untuk konfirmasi.");
                    return true;
                }

            });
        });

    </script>
    <?php
    if($pages == "selesai"){?>
    <script>$(function () {
            $('#actionmodal').modal('show');
        });</script>
    <?php } ?>
@endsection

