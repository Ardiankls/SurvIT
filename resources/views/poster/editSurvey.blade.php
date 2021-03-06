@extends('layouts.app')
@include('poster.modal.resubmitModal')
@section('content')
    <div class="container-xxl  p-5">
        <div class="row justify-content-center ">
            <div class="col-md-9"></div>
            <div class="col-md-8 mt-5 ">
                <div class="bg-white rounded-lg shadow d-none d-md-block" style="">
                    <h1 class="p-3 text-center">Detail Survei</h1>
                    <div class="container" style="padding: 20px 55px;">
                        <form action="{{ route('survey.update', $survey) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">

                            <div class="form-group">
                                <label>Judul</label>
                                <input class="form-control" type="text" name="title" value={{ $survey->title }} required>
                            </div>

                            <div class="form-group">
                                <label>Link Form</label>
                                <input class="form-control" type="text" name="link" value={{ $survey->link }} required>
                            </div>

                            {{-- <div class="form-group">
                                <label>Poin</label>
                                <input class="form-control" type="text" name="pay" value={{ $survey->pay }}>
                            </div>

                            <div class="form-group">
                                <label>Limit</label>
                                <input class="form-control" type="text" name="limit" value={{ $survey->limit }}>
                            </div> --}}

                            <div class="form-group"><label>Paket</label>
                                <select name="package" class="custom-select">
                                    @foreach ($packages as $package)
                                        <?php
                                            $selected = '';
                                            if ($survey->package_id == $package->id) {
                                                $selected = 'selected';
                                            }
                                        ?>
                                        <option value="{{ $package->id }}" {{ $selected }}>{{ $package->description }}</option>
                                    @endforeach
                                </select>
                                <a href="/price" target="_blank" >Lihat Paket</a>
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="gender" class="custom-select">
                                    @foreach ($genders as $gender)
                                        <?php
                                        $selected = '';
                                        if ($survey->gender_id == $gender->id) {
                                            $selected = 'selected';
                                        }
                                        ?>
                                        <option value="{{ $gender->id }}" {{ $selected }}>{{ $gender->gender }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <select name="job" class="custom-select">
                                    @foreach ($jobs as $job)
                                        <?php
                                        $selected = '';
                                        if ($survey->jobs->first()->id == $job->id) {
                                            $selected = 'selected';
                                        }
                                        ?>
                                        <option value="{{ $job->id }}" {{ $selected }}>{{ $job->job_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group" id="interest">
                                <label>Kesukaan</label>
                                {{-- {{ dd($survey->interests[2]) }} --}}
                                @php
                                    $count = 0;
                                @endphp
                                <div id="more2">
                                    @foreach ($survey->interests as $nyoba)
                                        <div>
                                            @if($count != 0)
                                                <select name="interest[]" class="custom-select" style="width: 95%;">
                                                    @foreach ($interests as $interest)
                                                        <?php
                                                        $selected = '';
                                                        if ($nyoba->id == $interest->id) {
                                                            $selected = 'selected';
                                                        }
                                                        ?>
                                                        <option value="{{ $interest->id }}" {{ $selected }}>
                                                            {{ $interest->interest }} </option>
                                                    @endforeach
                                                </select>
                                                <a href="javascript:void(0);" class="remove_button2">X</a>
                                            @else
                                            <select name="interest[]" class="custom-select">
                                                <option value={{ 1 }}>Tidak ada</option>
                                                @foreach ($interests as $interest)
                                                    <?php
                                                    $selected = '';
                                                    if ($nyoba->id == $interest->id) {
                                                        $selected = 'selected';
                                                    }
                                                    ?>
                                                    <option value="{{ $interest->id }}" {{ $selected }}>
                                                        {{ $interest->interest }} </option>
                                                @endforeach
                                            </select>
                                            @endif
                                            @php
                                                $count++;
                                            @endphp
                                        </div>
                                    @endforeach
                                </div>
                                <div id="more"></div>
                                <button type="button" name="add" id="add" class="btn btn-success" onclick="addFields()">Add
                                    More</button>
                            </div>

                            <div class="form-group">
                                <label>Provinsi</label>
                                <select name="province" class="custom-select">
                                    <option value={{ 1 }}>Tidak ada</option>
                                    @foreach ($provinces as $province)
                                        <?php
                                        $selected = '';
                                        if ($survey->provinces->first()->id == $province->id) {
                                            $selected = 'selected';
                                        }
                                        ?>
                                        <option value="{{ $province->id }}" {{ $selected }}>
                                            {{ $province->province }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @if($survey->evidence != null)
                                <div class="form-group">
                                    <label>Bukti Pembayaran</label><br>
                                    <img style="width: 50%;" src="/images/payment/survey/{{ $survey->evidence }}" alt="">
                                </div>
                            @endif

                            @if($survey->status_id == '2' || $survey->status_id == '1')
                                <div class="float-left">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            @endif
                        </form>

                        @if($survey->status_id == '2' || $survey->status_id == '1')
                            <div class="float-right">
                                <form action="{{ route('survey.destroy', $survey) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        @endif
                        <div class="p-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript'>
        //Once add button is clicked
        function addFields() {
            // Container <div> where dynamic content will be placed
            var container = $("#more");
            // Add field
            var fieldHTML = '<div><select name="interest[]" class="custom-select" style="width: 95%;">\
                                            @foreach ($interests as $interest)\
                                                <option value="{{ $interest->id }}" required>\
                                                    {{ $interest->interest }} </option>\
                                            @endforeach\
                                        </select>\
                                        <a href="javascript:void(0);" class="remove_button">X</a></div>'

            container.append(fieldHTML);
        }

        // function removeFields() {
        //     e.preventDefault();
        //     $(this).parent('div').remove(); //Remove field html
        //     x--; //Decrement field counter
        // }

        //Once remove button is clicked
        $("#more").on('click', '.remove_button', function(e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
        });

        $("#more2").on('click', '.remove_button2', function(e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
        });
    </script>

    {{-- <script>
        $(document).ready(function() {
            // Show the Modal on load
            @guest
                $("#guest").modal("show");
            @endguest

            // Hide the Modal
            $("#myBtn").click(function() {
                $("#resubmit").modal("hide");
            });

            $("#myBtn2").click(function() {
                $("#resubmit").modal("hide");
            });
        });
    </script> --}}
@endsection
