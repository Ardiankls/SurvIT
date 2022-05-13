@extends('layouts.app')
@include('surveyor.modal.guestModal')
<head>
    <meta name="Description" content="Platform Survei Untuk Kamu Para Mahasiswa Yang Butuh Data" />
</head>
@section('content')
    {{-- Old UI --}}
    {{-- <div class="container-sm"> --}}
    {{-- <div class="row justify-content-center"> --}}
    {{-- @guest --}}
    {{-- <iframe src={{ $survey->link }} width="640" height="600vh" frameborder="0" marginheight="0" --}}
    {{-- marginwidth="0">Loading…</iframe> --}}
    {{-- @else --}}
    {{-- <iframe src={{ $survey->link }} width="640" height="570vh" frameborder="0" marginheight="0" --}}
    {{-- marginwidth="0">Loading…</iframe> --}}
    {{-- <form action="{{ route('usersurvey.update', $survey) }}" method="post" enctype="multipart/form-data"> --}}
    {{-- @csrf --}}
    {{-- <input name="_method" type="hidden" value="PATCH"> --}}
    {{-- <button class="btn btn-sm btn-primary px-5 mx-auto" id="selesai" type="submit" --}}
    {{-- >Selesai --}}
    {{-- </button> --}}
    {{-- </form> --}}
    {{-- @endguest --}}
    {{-- </div> --}}
    {{-- </div> --}}

    {{-- New UI --}}
    {{-- MOBILE --}}
    <div id="content" class="p-md-5 pt-5 d-md-none">
        <div class="row justify-content-center">
            <div style="overflow-y:scroll; height:100vh;">
                <div class="">
                    <div class="panel ml-3 py-3 glass shadow" style="height:100vh;">
                        <h5 class="px-4">Isi Survei</h5>
                        <div style="overflow: auto; height:90%;">
                            <div class="survey align-content-center">
                                <iframe id="redirect" src={{ $survey->link }} width="100%"
                                    height="80%" frameborder="0" marginheight="0" marginwidth="0" onload="onMyFrameLoad(this)">Memuat…</iframe></div>
                            <div class="text-dark mt-4 px-4">
                                @guest
                                    Jika anda ingin mendapatkan poin dengan mengisi survei ini, segera daftarkan diri anda di
                                    Survit!
                                @else
                                    @if ($survey->user_id != $user->id)
                                        Klik "Selesai" jika anda telah mengisi <b>SEMUA</b> form dengan benar
                                        <div>
                                            <button class="btn btn-sm btn-primary mx-auto pt-2 mt-2" style="width:100%" data-toggle="modal"
                                                data-target="#confirmation">Selesai
                                            </button>
                                        </div>
                                    @endif
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- DESKTOP --}}
    <div id="content" class="p-md-5 pt-5 d-none d-md-block">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="panel mr-3 px-4 py-3 glass shadow" style="height:100vh;">
                    <h5 class="">Isi Survei</h5>
                    <div class="table-responsive custom-table-responsive mx-auto" style="overflow: auto; height:90%;">
                        <div class="ml-5 survey align-content-center">
                            <iframe id="redirect" src={{ $survey->link }} width="95%"
                                height="90%" frameborder="0" marginheight="0" marginwidth="0" onload="onMyFrameLoad(this)">Memuat…</iframe>
                        </div>
                        <div class="text-dark mt-3 px-5 ">
                            @guest
                                Jika anda ingin mendapatkan poin dengan mengisi survei ini, segera daftarkan diri anda di
                                Survit!
                            @else
                                @if ($survey->user_id != $user->id)
                                    Klik "Selesai" jika anda telah mengisi <b>SEMUA</b> form dengan benar
                                    <div class="float-end ">
                                        <button class="btn btn-sm btn-primary px-5 mx-auto pt-2" data-toggle="modal"
                                            data-target="#confirmation">Selesai
                                        </button>
                                    </div>
                                @endif
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    {{-- <script>
        $(document).ready(function () {
            $('.l4V7wb').onsubmit({
                alert("Submit !");
            });
        })
    </script> --}}

    {{-- <script>
        var page = -1;

        function onMyFrameLoad() {
            page++;
            if(page > 1){
                alert('Terima Kasih Sudah Mengisi Survei');
                // document.location = @json(route('usersurvey.update', $survey));
                // $("#confirmation").modal("show");
            }
        };
    </script> --}}

@endsection
