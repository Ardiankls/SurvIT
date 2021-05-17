<div class="modal fade" id="demography" tabindex="-1" role="dialog">
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

                        {{--                        CHECKBOX--}}
                        <label>Kesukaan / Topik / Hobi</label>
                        <div class="container rounded border ">
                            <div class="row mt-3">
                                    <div class="col-6">
                                        <div class="form-group ">
                                            <label><input class="single-checkbox" type="checkbox" name="interest[]" aria-label="Checkbox for following text input"
                                                        value="2"> Olahraga</label>
                                        </div>
                                        <div class="form-group ">
                                            <label><input type="checkbox" name="interest[]" aria-label="Checkbox for following text input"
                                                        value="3"> Musik</label>
                                        </div>
                                        <div class="form-group ">
                                            <label><input class="single-checkbox" type="checkbox" name="interest[]" aria-label="Checkbox for following text input"
                                                        value="4"> Buku</label>
                                        </div>
                                        <div class="form-group ">
                                            <label><input class="single-checkbox" type="checkbox" name="interest[]" aria-label="Checkbox for following text input"
                                                        value="5"> Film</label>
                                        </div>
                                        <div class="form-group  ">
                                            <label><input class="single-checkbox" type="checkbox" name="interest[]" aria-label="Checkbox for following text input"
                                                        value="6"> Games</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group ">
                                            <label><input class="single-checkbox" type="checkbox" name="interest[]" aria-label="Checkbox for following text input"
                                                        value="7"> Kuliner</label>
                                        </div>
                                        <div class="form-group ">
                                            <label><input class="single-checkbox" type="checkbox" name="interest[]" aria-label="Checkbox for following text input"
                                                        value="8"> Teknologi</label>
                                        </div>
                                        <div class="form-group ">
                                            <label><input class="single-checkbox" type="checkbox" name="interest[]" aria-label="Checkbox for following text input"
                                                        value="9"> Fashion</label>
                                        </div>
                                        <div class="form-group ">
                                            <label><input class="single-checkbox" type="checkbox" name="interest[]" aria-label="Checkbox for following text input"
                                                        value="10"> Seni</label>
                                        </div>
                                        <div class="form-group  ">
                                            <label><input class="single-checkbox" type="checkbox" name="interest[]" aria-label="Checkbox for following text input"
                                                        value="11"> Kecantikan</label>
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

                        <button class="btn btn-primary"  id="checkBtn" type="submit" style="background-color: rgb(221,177,226);">Submit
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

<div class="modal fade  " id="getpoint" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Penarikan Point</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center font-weight-bold">PERHATIAN</div>
                <div class="container p-4">
                    <div class="text-left">1. Proses paling lama akan memakan waktu selama 2 minggu</div>
                    <div class="text-left">2. Penarikan minimum adalah 10000 point yang akan dikonversi menjadi Rp10.000 karena adalah minimal transfer</div>
                    <div class="text-left">3. Biaya tambahan seperti pajak transfer beda bank akan dikenakan kepada user yang dapat berupa pengurangan point atau nominal penarikan point <br> (Rekening yang dianjurkan adalah BCA)</div>
                </div>

                <form action="{{route('survey.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="container" style="padding: 20px 55px;">
                        <div class="form-group">
                            <div class="form-group"><label>Nominal</label>
                                <input class="form-control" type="number" name="nominal" min="10000" required></div>
                        </div>
                        <select class="form-control">
                            <option>BCA</option>
                            <option>BCA Syariah</option>
                            <option>BRI</option>
                            <option>BRI Syariah</option>
                            <option>Mandiri</option>
                            <option>Bukopin</option>
                            <option>BNI</option>
                            <option>Bank Mega</option>
                            <option>Bank Danamon</option>
                        </select>
                        <div class="form-group">
                            <div class="form-group"><label>Rekening</label>
                                <input class="form-control" type="number" name="nominal" value="" required></div>
                        </div>
                        <button class="btn btn-primary" type="submit" style="">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="demography" tabindex="-1" role="dialog">
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

                        {{--                        CHECKBOX--}}
                        <label>Kesukaan / Topik / Hobi</label>
                        <div class="container rounded border ">
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="form-group ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]" aria-label="Checkbox for following text input"
                                                      value="2"> Olahraga</label>
                                    </div>
                                    <div class="form-group ">
                                        <label><input type="checkbox" name="interest[]" aria-label="Checkbox for following text input"
                                                      value="3"> Musik</label>
                                    </div>
                                    <div class="form-group ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]" aria-label="Checkbox for following text input"
                                                      value="4"> Buku</label>
                                    </div>
                                    <div class="form-group ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]" aria-label="Checkbox for following text input"
                                                      value="5"> Film</label>
                                    </div>
                                    <div class="form-group  ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]" aria-label="Checkbox for following text input"
                                                      value="6"> Games</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]" aria-label="Checkbox for following text input"
                                                      value="7"> Kuliner</label>
                                    </div>
                                    <div class="form-group ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]" aria-label="Checkbox for following text input"
                                                      value="8"> Teknologi</label>
                                    </div>
                                    <div class="form-group ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]" aria-label="Checkbox for following text input"
                                                      value="9"> Fashion</label>
                                    </div>
                                    <div class="form-group ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]" aria-label="Checkbox for following text input"
                                                      value="10"> Seni</label>
                                    </div>
                                    <div class="form-group  ">
                                        <label><input class="single-checkbox" type="checkbox" name="interest[]" aria-label="Checkbox for following text input"
                                                      value="11"> Kecantikan</label>
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

                        <button class="btn btn-primary"  id="checkBtn" type="submit" style="background-color: rgb(221,177,226);">Submit
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

<div class="modal fade" id="actionmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Terimakasih Sudah Mengisi Survey
                    Kami</h5>
            </div>
            <div class="modal-body">
                <p>Kami akan melakukan pengecekan validasi survey anda, apabila pengisian survey sudah valid. Maka status
                    akan berubah menjadi "Sukses"</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('input[type=checkbox]').change(function(e){
        if ($('input[type=checkbox]:checked').length > 3) {
            $(this).prop('checked', false)
            alert("allowed only 3");
        }
    })
</script>

