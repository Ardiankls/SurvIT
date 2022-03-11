<div class="modal fade" id="confirmation" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Konfirmasi Pengisian Survei</h5>
            </div>
            <div class="modal-body">
                <p>Kami akan melakukan pengecekan pengisian Kamu terlebih dahulu. Apabila pengisian survey sudah valid, maka poin
                    akan diberikan. Kamu bisa melihat status pengecekan di riwayat poin.</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('usersurvey.update', $survey) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    <button class="btn btn-sm btn-primary px-5 mx-auto pt-2" type="submit">Setuju
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
