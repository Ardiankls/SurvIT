@extends('layouts.app')
@section('content')
    <div class="container-sm">
        <div class="row justify-content-center">
            <iframe src={{ $survey->link }} width="640" height="550" frameborder="0" marginheight="0"
                marginwidth="0">Loading…</iframe>

        </div>
        <div class="row justify-content-center mt-2">
            <form action="{{ route('usersurvey.edit', $survey) }}" method="GET" enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PATCH">
                <button class="btn btn-primary" id="selesai" type="submit" style="background-color: rgb(0,0,226); width:640px;">Selesai
                </button>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#selesai').click(function () {
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
@endsection
