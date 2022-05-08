<div class="modal fade  " id="pay-{{ $survey->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Pembayaran Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <form action="{{route('survey.payment', $survey)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="container" style="padding: 20px 55px;">
                        <div class="form-group">
                            <div class="form-group"><label>Jumlah yang harus dibayar</label>
                                <input class="form-control" value="Rp. {{ $survey->package->price }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group"><label>Transfer ke rekening</label>
                                <input class="form-control" value="8620309819" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group"><label>Bukti Transfer</label>
                                <br>
                                <input type="file" id="file" name="file" required>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" onclick="this.disabled=true;this.form.submit();">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
