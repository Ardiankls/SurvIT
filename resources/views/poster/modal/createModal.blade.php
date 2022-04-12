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
                        {{-- <a class="float-end" href="">petunjuk pembuatan survei di survit</a> --}}
                        <div class="form-group"><label>Judul</label>
                            <input class="form-control border" type="text" name="title" required>
                        </div>

                        <div class="form-group">
                            <label>Link Form</label>
{{--                            <a href="https://google.com" class="text-primary pe-auto float-end">Petunjuk</a>--}}
                            <input class="form-control border" type="text" name="link" required>
                        </div>
                        <div class="form-group">
                            <label>Link Edit Form</label>
{{--                            <a href="https://google.com" class="text-primary pe-auto float-end"> Petunjuk</a>--}}
                            <input class="form-control border" type="text" name="edit_link" required>
                        </div>

                        {{-- <div class="form-group"><label>Poin</label>
                            <input class="form-control" type="text" name="pay" required>
                        </div>

                        <div class="form-group"><label>Limit</label>
                            <input class="form-control" type="text" name="limit" required>
                        </div> --}}

                        <div class="form-group"><label>Paket</label>
                            <select name="package" class="custom-select">
                                @foreach ($packages as $package)
                                    <option value="{{ $package->id }}">{{ $package->description }}</option>
                                @endforeach
                            </select>
                            <a href={{ route('package.index') }} target="_blank" >Lihat Pricing</a>
                        </div>

                        <div class="form-group"><label>Dibagikan ke umum</label>
                            <input type='hidden'name="shareable"  value='0'>
                            <input class="float-right" type="checkbox" name="shareable" value="1">
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

                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- <div class="modal fade" id="pricing" tabindex="-1" role="dialog">
    <div class="modal-dialog-scrollable" role="document" style="padding: 100px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Daftar Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="myBtn">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr class="text-center">
                            <th scope="col"></th>
                            <th scope="col">Basic</th>
                            <th scope="col">Custom</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr class="text-center">
                                <td>
                                    Respondent
                                </td>
                                <td>
                                    50-100
                                </td>
                                <td>
                                    50-200
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>
                                    Demography Mapping
                                </td>
                                <td>
                                    Iya
                                </td>
                                <td>
                                    Iya
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>
                                    Waktu
                                </td>
                                <td>
                                    1-4 Minggu
                                </td>
                                <td>
                                    1-4 Minggu
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>
                                    Report and Visualization
                                </td>
                                <td>
                                    1-4 Minggu
                                </td>
                                <td>
                                    1-4 Minggu
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>
                                    Konsultasi
                                </td>
                                <td>
                                    1-4 Minggu
                                </td>
                                <td>
                                    1-4 Minggu
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>
                                    Survey Form
                                </td>
                                <td>
                                    1-4 Minggu
                                </td>
                                <td>
                                    1-4 Minggu
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>
                                    Harga
                                </td>
                                <td>
                                    Rp. 40,000 - 100,000
                                </td>
                                <td>
                                    Rp. 200,000 - 320,000
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="myBtn2">Close</button>
            </div>
        </div>
    </div>
</div> --}}

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
