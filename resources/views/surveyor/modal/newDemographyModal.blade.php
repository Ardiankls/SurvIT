<div class="modal fade" id="newdemography" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Lengkapi Demografi Kamu</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.add.demography') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if($user->birthdate == null)
                        <div class="form-group">
                            <label>Isi tanggal lahir Kamu dan dapatkan <b>500 poin</b></label>
                            <input class="form-control border" type="date" name="birthdate" required>
                        </div>

                        <div class="float-right">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    @endif
                </form>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Isi nanti</button>
            </div> --}}
        </div>
    </div>
</div>
