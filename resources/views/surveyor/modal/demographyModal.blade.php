<div class="modal fade" id="demography" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered glass panel" role="document">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Isi Demografi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="container" style="padding: 20px 55px;">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
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

                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input class="form-control border" type="date" name="birthdate" required>
                        </div>

                        {{-- CHECKBOX --}}
                        <label>Kesukaan / Topik / Hobi</label>
                        <div class="container rounded border ">
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="form-group ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                aria-label="Checkbox for following text input" value="2">
                                            Olahraga</label>
                                    </div>
                                    <div class="form-group ">
                                        <label><input type="checkbox" name="interest[]"
                                                aria-label="Checkbox for following text input" value="3"> Musik</label>
                                    </div>
                                    <div class="form-group ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                aria-label="Checkbox for following text input" value="4"> Buku</label>
                                    </div>
                                    <div class="form-group ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                aria-label="Checkbox for following text input" value="5"> Film</label>
                                    </div>
                                    <div class="form-group  ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                aria-label="Checkbox for following text input" value="6"> Games</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                aria-label="Checkbox for following text input" value="7">
                                            Kuliner</label>
                                    </div>
                                    <div class="form-group ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                aria-label="Checkbox for following text input" value="8">
                                            Teknologi</label>
                                    </div>
                                    <div class="form-group ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                aria-label="Checkbox for following text input" value="9">
                                            Fashion</label>
                                    </div>
                                    <div class="form-group ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                aria-label="Checkbox for following text input" value="10"> Seni</label>
                                    </div>
                                    <div class="form-group  ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                aria-label="Checkbox for following text input" value="11">
                                            Kecantikan</label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group mt-1"><label>Provinsi</label>
                            <select name="province" class="custom-select">
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->province }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-primary" id="checkBtn" type="submit">Simpan
                        </button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

{{-- <div class="modal fade" id="demography" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Isi Demografi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="container" style="padding: 20px 55px;">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
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

                        CHECKBOX
                        <label>Kesukaan / Topik / Hobi</label>
                        <div class="container rounded border ">
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="form-group ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                aria-label="Checkbox for following text input" value="2">
                                            Olahraga</label>
                                    </div>
                                    <div class="form-group ">
                                        <label><input type="checkbox" name="interest[]"
                                                aria-label="Checkbox for following text input" value="3"> Musik</label>
                                    </div>
                                    <div class="form-group ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                aria-label="Checkbox for following text input" value="4"> Buku</label>
                                    </div>
                                    <div class="form-group ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                aria-label="Checkbox for following text input" value="5"> Film</label>
                                    </div>
                                    <div class="form-group  ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                aria-label="Checkbox for following text input" value="6"> Games</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                aria-label="Checkbox for following text input" value="7">
                                            Kuliner</label>
                                    </div>
                                    <div class="form-group ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                aria-label="Checkbox for following text input" value="8">
                                            Teknologi</label>
                                    </div>
                                    <div class="form-group ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                aria-label="Checkbox for following text input" value="9">
                                            Fashion</label>
                                    </div>
                                    <div class="form-group ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                aria-label="Checkbox for following text input" value="10"> Seni</label>
                                    </div>
                                    <div class="form-group  ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]"
                                                aria-label="Checkbox for following text input" value="11">
                                            Kecantikan</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-1"><label>Provinsi</label>
                            <select name="province" class="custom-select">
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->province }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-primary" id="checkBtn" type="submit"
                            style="background-color: rgb(221,177,226);">Submit
                        </button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> --}}

{{-- <script>
    $('input[type=checkbox]').change(function(e) {
        if ($('input[type=checkbox]:checked').length > 3) {
            $(this).prop('checked', false)
            alert("allowed only 3");
        }
    })
</script> --}}
