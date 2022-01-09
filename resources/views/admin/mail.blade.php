@extends('layouts.app')
@section('content')
    <div class="container-xxl  p-5">
        <div class="row justify-content-center ">
            <div class="col-md-9"></div>
            <div class="col-md-8 mt-5 ">
                <div class="bg-white rounded-lg shadow d-none d-md-block" style="">
                    <h1 class="p-3 text-center">Blast Survei Baru</h1>
                    <form action="{{ route('mail.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="container" style="padding: 20px 55px;">
                            {{-- <div class="form-group">
                                <div class="form-group"><label>Subject</label>
                                    <input class="form-control" type="text" name="subject"></div>
                                <div class="form-group"><label>Pesan</label>
                                    <textarea class="form-control" rows="3" name="message" required></textarea>
                                </div>
                            </div> --}}

                            <div class="form-group"><label>Jenis Kelamin</label>
                                <select name="gender" class="custom-select">
                                    @foreach ($genders as $gender)
                                        <option value="{{ $gender->id }}">{{ $gender->gender }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group"><label>Pekerjaan</label>
                                <select name="job" class="custom-select">
                                    @foreach ($jobs as $job)
                                        <option value="{{ $job->id }}">{{ $job->job_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group"><label>Kesukaan</label>
                                <select name="interest[]" class="custom-select" id="interest">
                                    <option value="{{ 1 }}" selected>Tidak ada</option>
                                    @foreach ($interests as $interest)
                                        <option value="{{ $interest->id }}" required>
                                            {{ $interest->interest }} </option>
                                    @endforeach
                                </select>
                                <div id="container">
                                    <div id="more"></div>
                                </div>
                                <button type="button" name="add" id="add" class="btn btn-success" onclick="addFields()">Add
                                    More</button>
                            </div>

                            <div class="form-group"><label>Provinsi</label>
                                <select name="province" class="custom-select">
                                    <option value={{ 1 }} selected>Tidak ada</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->province }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                        </div>
                    </form>
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
            var fieldHTML = '<div id="test"><select name="interest[]" class="custom-select" style="width: 90%;">\
                                        @foreach ($interests as $interest)\
                                            <option value="{{ $interest->id }}" required>\
                                                {{ $interest->interest }} </option>\
                                        @endforeach\
                                    </select>\
                                    <a href="javascript:void(0);" class="remove_button">X</a></div>'
            // Choice
            var x = document.getElementById("interest").value;
            if(x != 1){
                container.append(fieldHTML);
            }else{
                alert(
                    "Input pertama harus diset terlebih dahulu."
                );
            }
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

        $("#submit").on('click', '.remove_button', function(e) {
            var x = document.getElementById("interest").value;
            if(count(x) > 1 && x == 1){
                alert(
                    "Terjadi Kesalahan."
                );
            }
        });
    </script>
@endsection
