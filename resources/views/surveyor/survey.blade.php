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
        <div class="col-9">
            <div class="panel mr-3 px-4 py-3 glass shadow mb-3" style="height:630px;">
                <h5 class="">Survey list</h5>
                <div class="table-responsive custom-table-responsive" style="overflow: auto; height:600px;">

                    <div class="ml-5 survey align-content-center"><iframe src={{ $survey->link }} width="640" height="530" frameborder="0" marginheight="0" marginwidth="0">Memuat…</iframe></div>
                </div>
            </div>
            <form action="{{ route('usersurvey.update', $survey) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PATCH">
                <button class="btn btn-sm btn-primary px-5 mx-auto" id="selesai" type="submit"
                >Selesai
                </button>
            </form>

        </div>
        <div class="col-3">
            <div class="row mb-4">
                <div class=" panel glass shadow px-4 py-3">
                    <div class="row">
                        <div class="col-8">
                            <h5>Poin</h5>
                        </div>
                        <div class="col-4">
                            <div class="btn btn-primary">Ambil</div>
                        </div>
                    </div>
                    <div class="row">
                        <h2>
{{--                            {{ $user->point }}--}}
                        </h2>
                    </div>

                </div>
            </div>
            <div class="row mb-5">
                <div class="panel glass shadow px-4 py-3">
                    <div class="row">
                        <h5>News</h5>
                    </div>
                    <div class="row px-3 py-2">
                        <small class="text-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Vivamus eu mauris elementum, vulputate magna id, maximus dolor. Curabitur accumsan
                            mollis lectus nec ultrices. Nulla facilisi. Aliquam consectetur cursus justo sit
                            amet dapibus. Curabitur egestas arcu urna, accumsan luctus lectus dignissim quis.
                            Maecenas faucibus convallis magna, et lacinia neque congue vel. In pulvinar laoreet
                            semper. Proin sit amet pulvinar turpis, at tristique massa. Vivamus lacinia dolor at
                            lacus consectetur egestas. Morbi auctor elit et ante congue dignissim. Nam laoreet
                            nulla nec felis bibendum tristique.</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel glass shadow  px-4 py-3">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <div class="row text-start">
                                Ardian Kurniawan
                            </div>
                            <div class="row">
                                <small class="">ardian@email.com</small>
                            </div>
                        </div>
                        <div class="col-3"></div>
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
