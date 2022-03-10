@extends('layouts.app')
@section('content')
    <div class="container-xxl  p-5">
        <div class="row justify-content-center ">
            <div class="col-md-9"></div>

{{--            Old Ui--}}
{{--            <div class="col-md-8 mt-5">--}}
{{--                <div class="bg-white rounded-lg shadow d-none d-md-block" style="">--}}
{{--                    <div>--}}
{{--                        <div class="float-left pt-3 pl-3">--}}
{{--                            <h4>Profil</h4>--}}
{{--                        </div>--}}
{{--                        <div class="float-right pt-3 pr-3">--}}
{{--                            <a href="{{ route('user.edit', $user) }}" class="btn btn-primary">Ubah</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="p-5"></div>--}}
{{--                    <div class="text-center">--}}
{{--                        <img style="width: 20%;" src="/images/profile.png" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="p-3"></div>--}}
{{--                    <div class="col text-center">--}}
{{--                        <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>--}}
{{--                        <h4>{{ $user->email }}</h4><br>--}}
{{--                        Nama Depan: {{ $user->first_name }}<br>--}}
{{--                        Nama Belakang: {{ $user->last_name }}<br>--}}
{{--                        Nomor Telepon: {{ $user->phone }}<br>--}}
{{--                    </div>--}}
{{--                    <div class="p-5"></div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            NEW UI--}}
            <div id="content" class=" p-md-5 pt-5">
                <!-- <h2 class="mb-4">Sidebar #04</h2> -->
                <div class="row">
                    <div class="col-9">
                        <div class="panel mr-3 px-4 py-3 glass shadow ">
                            <div class="d-flex ">
                                <h5 class="flex-grow-1">Profile</h5>
                                <div class="btn btn-primary">
                                    <a href="{{ route('user.edit', $user) }}" class="text-white px-2 ">Ubah</a>
                                </div>
                            </div>
                            <div class="body">
                                <div class="row mb-5 mt-3">
                                    <div class="row mb-3">
                                        <img class="mx-auto" src="/images/profile.png" alt="" style="width: 10em;">
                                    </div>
                                    <div class="row">
                                        <h4 class="text-center">{{ $user->first_name }} {{ $user->last_name }}</h4>
                                    </div>
                                    <div class="row">
                                        <p class="text-center">{{ $user->email }}</p>
                                    </div>
                                </div>
                                <div class="row px-5">
                                    <div class="row">
                                        <div class="col-3 fs-5 text-dark ">
                                            Poin:
                                        </div>
                                        <div class="col-6 fs-5 text-primary">
                                            10,900
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3 fs-5 text-dark ">
                                            Surveys:
                                        </div>
                                        <div class="col-6 fs-5 text-primary">
                                            5
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3 fs-5 text-dark ">
                                            join Date:
                                        </div>
                                        <div class="col-6 fs-5 text-primary">
                                            25 Februari 2021
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <button class="btn  btn-danger">logout</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-3">
                        <div class="row mb-4">
                            <div class=" panel glass shadow px-4 py-3">
                                <div class="d-flex ">
                                    <h5 class="flex-grow-1">Demography</h5>
                                    <button class="btn btn-primary px-4 ">
                                        <a href="{{ route('user.edit', $user) }}" class="text-white">edit</a>
                                    </button>
                                </div>
                                <div class="body px-4 py-3">
                                    <div class="row mb-4">
                                        <div class="fs-6 text-dark font-weight-bold">Pekerjaan</div>
                                        <div class="ml-2 text-dark">
                                            <div> {{ $user->jobs->first()->job_name ?? 'null' }} </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="fs-6 text-dark font-weight-bold">Provinsi</div>
                                        <div class="ml-2 text-dark">
                                            <div>{{ $user->province->province ?? 'null' }}</div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="fs-6 text-dark font-weight-bold">Hobi/Kesukaan/Topik</div>
                                        <div class="ml-2 text-dark">
                                            @foreach($user->interests as $interest)
{{--                                            <div>{{ $user->interests->first()->interest ?? 'null' }}</div>--}}
{{--                                            <div>Games</div>--}}
{{--                                            <div>Teknologi</div>--}}
                                                {{$interest->interest}}
                                                <br>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="col-md-8 mt-5">--}}
{{--                <div class="bg-white rounded-lg shadow d-none d-md-block" style="">--}}
{{--                    @if ($user->is_survey_avail == '0')--}}
{{--                        <div>--}}
{{--                            <div class="float-left pt-3 pl-3">--}}
{{--                                <h4>Demografi</h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="p-5"></div>--}}
{{--                        <div class="col text-center">--}}
{{--                            Anda belum mengisi demografi--}}
{{--                        </div>--}}
{{--                        <div class="p-4"></div>--}}
{{--                    @else--}}
{{--                        <div>--}}
{{--                            <div class="float-left pt-3 pl-3">--}}
{{--                                <h4>Demografi</h4>--}}
{{--                            </div>--}}
{{--                            <div class="float-right pt-3 pr-3">--}}
{{--                                <a href="" class="btn btn-primary" id="edit" data-toggle="modal"--}}
{{--                                    data-target="#editdemography">Ubah</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="p-5"></div>--}}
{{--                        <div class="col text-center">--}}
{{--                            Jenis Kelamin: {{ $user->gender->gender ?? 'null' }}<br>--}}
{{--                            Pekerjaan: {{ $user->jobs->first()->job_name ?? 'null' }}<br>--}}
{{--                            Kesukaan / Topik / Hobi: {{ $user->interests->first()->interest ?? 'null' }}<br>--}}
{{--                            Provinsi: {{ $user->province->province ?? 'null' }}<br>--}}
{{--                        </div>--}}
{{--                        <div class="p-4"></div>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
    <div class="modal fade" id="editdemography" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLongTitle">Isi Demografi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.update', 'demography') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="container" style="padding: 20px 55px;">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="gender" class="custom-select">
                                    @foreach ($genders as $gender)
                                        @php
                                            $selected = '';
                                            if ($user->gender_id == $gender->id) {
                                                $selected = 'selected';
                                            }
                                        @endphp
                                        <option value="{{ $gender->id }}" {{ $selected }}>{{ $gender->gender }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group"><label>Pekerjaan</label>
                                <select name="job" class="custom-select">
                                    @foreach ($jobs as $job)
                                        @php
                                            $selected = '';
                                            if($user->jobs->first()){
                                                if ($user->jobs->first()->id == $job->id) {
                                                $selected = 'selected';
                                                }
                                            }
                                        @endphp
                                        <option value="{{ $job->id }}" {{ $selected }}>{{ $job->job_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- CHECKBOX --}}
                            <label>Kesukaan / Topik / Hobi</label>
                            <div class="container rounded border ">
                                <div class="row mt-3">
                                    <div class="col-6">
                                        @php
                                            $checked[2] = '';
                                            $checked[3] = '';
                                            $checked[4] = '';
                                            $checked[5] = '';
                                            $checked[6] = '';
                                            $checked[7] = '';
                                            $checked[8] = '';
                                            $checked[9] = '';
                                            $checked[10] = '';
                                            $checked[11] = '';
                                        @endphp
                                        @foreach ($user->interests as $uinterest)
                                            @php
                                                for ($i = 2; $i <= 11; $i++) {
                                                    if ($uinterest->id == $i) {
                                                        $checked[$i] = 'checked';
                                                    }
                                                }
                                            @endphp
                                        @endforeach
                                        <div class="form-group ">
                                            <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                    aria-label="Checkbox for following text input" value="2" {{ $checked[2] }}> Olahraga</label>
                                        </div>
                                        <div class="form-group ">
                                            <label><input type="checkbox" name="interest[]"
                                                    aria-label="Checkbox for following text input" value="3" {{ $checked[3] }}> Musik</label>
                                        </div>
                                        <div class="form-group ">
                                            <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                    aria-label="Checkbox for following text input" value="4" {{ $checked[4] }}> Buku</label>
                                        </div>
                                        <div class="form-group ">
                                            <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                    aria-label="Checkbox for following text input" value="5" {{ $checked[5] }}> Film</label>
                                        </div>
                                        <div class="form-group  ">
                                            <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                    aria-label="Checkbox for following text input" value="6" {{ $checked[6] }}> Games</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group ">
                                            <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                    aria-label="Checkbox for following text input" value="7" {{ $checked[7] }}> Kuliner</label>
                                        </div>
                                        <div class="form-group ">
                                            <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                    aria-label="Checkbox for following text input" value="8" {{ $checked[8] }}> Teknologi</label>
                                        </div>
                                        <div class="form-group ">
                                            <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                    aria-label="Checkbox for following text input" value="9" {{ $checked[9] }}> Fashion</label>
                                        </div>
                                        <div class="form-group ">
                                            <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                    aria-label="Checkbox for following text input" value="10" {{ $checked[10] }}> Seni</label>
                                        </div>
                                        <div class="form-group  ">
                                            <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                    aria-label="Checkbox for following text input" value="11" {{ $checked[11] }}> Kecantikan</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group mt-1"><label>Provinsi</label>
                                <select name="province" class="custom-select">
                                    @foreach ($provinces as $province)
                                        @php
                                            $selected = '';
                                            if ($user->province_id == $province->id) {
                                                $selected = 'selected';
                                            }
                                        @endphp
                                        <option value="{{ $province->id }}" {{ $selected }}>{{ $province->province }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-success" id="checkBtn" type="submit">Save
                            </button>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <input id="editable" name="editable" type="hidden" value={{$days}}>
    <script>
        $('input[type=checkbox]').change(function(e) {
            if ($('input[type=checkbox]:checked').length > 3) {
                $(this).prop('checked', false)
                alert("Kamu hanya dapat memilih maksimal 3");
            }
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#checkBtn').click(function() {
                checked = $("input[type=checkbox]:checked").length;

                if (!checked) {
                    alert("Kamu harus memilih minimal 1");
                    return false;
                }

            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var days = document.getElementById("editable").value;
            var left = 30 - days;
            $('#edit').click(function() {
                if (days >= 30) {
                    alert(
                        "Kamu hanya dapat mengubah demografi sekali dalam sebulan (30 hari)."
                    );
                    return true;
                }else{
                    alert(
                        "Kamu hanya dapat mengubah demografi sekali dalam sebulan (30 hari). Silahkan tunggu " + left + " hari lagi."
                    );
                    return false;
                }

            });
        });
    </script>
@endsection
