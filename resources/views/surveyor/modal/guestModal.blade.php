<div class="modal fade" id="guest" role="dialog">
    <div class="modal-dialog  modal-dialog-scrollable" role="document">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Peringatan</h5>
                <button type="button" class="close" data-dismiss="modal" id="myBtn" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-justify">
                Jika anda ingin mendapatkan poin dengan mengisi survei ini, segera daftarkan diri anda di
                Survit!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="myBtn2">Tidak dulu</button>
                <a href="{{ route('register') }}" class="btn btn-primary" data-dismiss="modal">Register Sekarang</a>
            </div>
        </div>
    </div>
</div>
