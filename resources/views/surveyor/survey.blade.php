@extends('layouts.app')
@section('content')

{{--    old ui--}}
{{--    <div class="container-sm">--}}
{{--        <div class="row justify-content-center">--}}
{{--            @guest--}}
{{--                <iframe src={{ $survey->link }} width="640" height="600vh" frameborder="0" marginheight="0"--}}
{{--                    marginwidth="0">Loading…</iframe>--}}
{{--            @else--}}
{{--                <iframe src={{ $survey->link }} width="640" height="570vh" frameborder="0" marginheight="0"--}}
{{--                    marginwidth="0">Loading…</iframe>--}}
{{--                <form action="{{ route('usersurvey.update', $survey) }}" method="post" enctype="multipart/form-data">--}}
{{--                    @csrf--}}
{{--                    <input name="_method" type="hidden" value="PATCH">--}}
{{--                    <button class="btn btn-sm btn-primary px-5 mx-auto" id="selesai" type="submit"--}}
{{--                         >Selesai--}}
{{--                    </button>--}}
{{--                </form>--}}
{{--            @endguest--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    new ui--}}
<div id="content" class=" p-md-5 pt-5">
    <!-- <h2 class="mb-4">Sidebar #04</h2> -->
    <div class="row">
            <div class="col-12">
                <div class="panel mr-3 px-4 py-3 glass shadow " style="height:690px;">
                    <h5 class="">Survey list</h5>
                    <div class="table-responsive custom-table-responsive mx-auto" style="overflow: auto; height:640px;">
                    <div class="ml-5 survey align-content-center"><iframe src={{ $survey->link }} width="98%" height="550" frameborder="0" marginheight="0" marginwidth="0">Memuat…</iframe></div>
                        <div class="text-dark mt-3 px-5 ">
                            Klik "Selesai" jika anda telah mengisi <b>SEMUA</b> form dengan benar
                            <div class="float-end ">

                                <form action="{{ route('usersurvey.update', $survey) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input name="_method" type="hidden" value="PATCH">
                                    <button class="btn btn-sm btn-primary px-5 mx-auto pt-2" id="selesai" type="submit"
                                    >Selesai
                                    </button>
                                </form>
                            </div>
                        </div>
                </div>
            </div>


            </div>

        </div>
    </div>
</div>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#selesai').click(function() {
                checked = $("input[type=checkbox]:checked").length;

                if (!checked) {
                    alert(
                        "Kami akan melakukan pengecekan validasi survey anda, apabila pengisian survey sudah valid. Maka status akan berubah menjadi Sukses. Klik Ok untuk konfirmasi."
                    );
                    return true;
                }

            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Show the Modal on load
            @guest
                $("#guest").modal("show");
            @endguest

            // Hide the Modal
            $("#myBtn").click(function() {
                $("#guest").modal("hide");
            });

            $("#myBtn2").click(function() {
                $("#guest").modal("hide");
            });
        });
    </script>
@endsection
