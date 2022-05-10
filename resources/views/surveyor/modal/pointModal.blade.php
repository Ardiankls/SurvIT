<div class="modal fade  " id="getpoint" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Penarikan Poin</h5>
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

                <form action="{{route('payment.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="container" style="padding: 20px 55px;">
                        <div class="form-group">
                            <div class="form-group"><label>Nominal</label>
                                <input class="form-control border" id="nominal" type="tel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="value" value="10000" min="10000" required>
                                <input class="form-control" id="upoint" type="hidden" name="upoint" value={{ $user->point }}>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group"><label>Bank</label>
                                <select name="bank" class="form-control border">
                                    <option value="BCA">BCA</option>
                                    <option value="BCA Syariah">BCA Syariah</option>
                                    <option value="BRI">BRI</option>
                                    <option value="BRI Syariah">BRI Syariah</option>
                                    <option value="Mandiri">Mandiri</option>
                                    <option value="Bukopin">Bukopin</option>
                                    <option value="BNI">BNI</option>
                                    <option value="Bank Mega">Bank Mega</option>
                                    <option value="Bank Danamon">Bank Danamon</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group"><label>Rekening</label>
                                @if($user->transfer != null)
                                    <input class="form-control border" type="tel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="transfer" value="{{ $user->transfer }}" required>
                                @else
                                    <input class="form-control border" type="tel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="transfer" required>
                                @endif
                            </div>
                        </div>
                        <button class="btn btn-primary" id="pointBtn" type="submit">Ajukan</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
