<div class="modal fade  " id="createsurvey" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Buat Survei</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('survey.store') }}" id="dynamic" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="container" style="padding: 20px 55px;">
                         <a class="float-end" href="PetunjukPembuatanSurvey.pdf" target="_blank">petunjuk pembuatan survei di survit</a>
                        <div class="form-group"><label>Judul</label>
                            <input class="form-control border" type="text" name="title" required>
                        </div>

                        <div class="form-group">
                            <label>Link Form (Tidak dishorten)</label>
{{--                            <a href="https://google.com" class="text-primary pe-auto float-end">Petunjuk</a>--}}
                            <input class="form-control border" type="text" name="link" required>
                        </div>
                        <div class="form-group">
                            <label>Link Edit Form</label>
{{--                            <a href="https://google.com" class="text-primary pe-auto float-end"> Petunjuk</a>--}}
                            <input class="form-control border" type="text" name="edit_link" required>
                        </div>

                        <div class="form-group"><label>Paket</label>
                            <select name="package" class="custom-select">
                                @foreach ($packages as $package)
                                    <option value="{{ $package->id }}">{{ $package->description }}</option>
                                @endforeach
                            </select>
                            <a href={{ route('package.index') }} target="_blank" >Lihat Keterangan Paket</a>
                        </div>

                        <div class="form-group text-center">
                            ------- Filter Demografi -------
                        </div>

                        <div class="form-group"><label class="mt-2">Sebar diluar responden Survit </label>
                            <input type='hidden' name="shareable" value='0'>
                            <input class="float-right mt-3" type="checkbox" name="shareable" value="1">
                        </div>

                        <div class="form-group"><label>Usia</label><br>
                            <input class="form border text-center" id="agefrom" type="tel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="agefrom" style="width: 10%" value="0" required>
                            hingga
                            <input class="form border text-center" id="ageto" type="tel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="ageto" style="width: 10%" value="99" required>
                            <p class="mt-2 float-right" style="font-size: 10px">
                                *Default: 0 hingga 99 (Semua umur)
                            </p>
                        </div>

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

                        <div class="form-group" id="interest"><label>Kesukaan</label>
                            <select name="interest[]" class="custom-select" id="test">
                                @foreach ($interests as $interest)
                                    <option value="{{ $interest->id }}" required>
                                        {{ $interest->interest }} </option>
                                @endforeach
                            </select>
                            <div id="container">
                                <div id="more"></div>
                            </div>
                            {{-- <button type="button" name="add" id="add" class="btn btn-primary" onclick="addFields()">Add
                                More</button> --}}
                        </div>

                        <div class="form-group"><label>Provinsi</label>
                            <select name="province" class="custom-select">
                                <option value={{ 1 }} selected>Tidak ada</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->province }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-success" id="createBtn" type="submit">Simpan</button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript'>
    // var counter = 2;

    //Once add button is clicked
    function addFields() {
        // Number of inputs to create
        var number = document.getElementById("test").value;
        // Container <div> where dynamic content will be placed
        var container = $("#more");
        // Add field
        var fieldHTML = '<div><select name="interest[]" class="custom-select" style="width: 90%;">\
                            @foreach ($interests as $interest)\
                                <option value="{{ $interest->id }}" required>\
                                    {{ $interest->interest }} </option>\
                            @endforeach\
                        </select>\
                        <a href="javascript:void(0);" class="remove_button">X</a></div>'

        container.append(fieldHTML);
        // counter++;

        // namenya beda atau array
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
        // counter--; //Decrement field counter
    });
</script>
