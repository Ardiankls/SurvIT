<div class="modal fade" id="customMail" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Send Custom Email</h5>
                <button type="button" class="close" data-dismiss="modal" id="myBtn" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('mail.send-custom-mail') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Receiver</label>
                        <input class="form-control border" type="text" name="receiver" required>
                    </div>

                    <div class="form-group">
                        <label>Subject</label>
                        <input class="form-control border" type="text" name="subject" required>
                    </div>

                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="border" name="contents" rows="4" style="width: 100%" required></textarea>
                    </div>

                    <div class="float-right">
                        <button class="btn btn-primary" id="addDemoBtn" type="submit">Kirim</button>
                    </div>
                </form>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Isi nanti</button>
            </div> --}}
        </div>
    </div>
</div>
