@extends('layouts.app')
@section('content')
    {{-- MOBILE --}}
    <div class="container-xxl d-md-none" style="overflow-y:scroll; height:100vh">
        <div class="row justify-content-center">
            <div class="col-md-9"></div>
            <div class="col-md-8 pt-2 mt-5 mb-2">
                <div class="bg-white rounded-lg shadow" style="">
                    <h3 class="p-3 text-center">Perbarui Demografi</h3>
                    <div class="container" style="padding: 20px 30px;">
                        <form action="{{ route('user.add.demography') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            @if($user->birthdate == null)
                                <div class="form-group">
                                    <label>Isi Tanggal Lahir Kamu</label>
                                    <input class="form-control border" type="date" name="birthdate" required>
                                </div>

                                <div class="float-left">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- DESKTOP --}}
    <div class="container-xxl p-5 d-none d-md-block" style="overflow-y:scroll; height:100vh">
        <div class="row justify-content-center ">
            <div class="col-md-9"></div>
            <div class="col-md-8 mt-5">
                <div class="bg-white rounded-lg shadow">
                    <h1 class="p-3 text-center">Perbarui Demografi</h1>
                    <div class="container" style="padding: 20px 55px;">
                        <form action="{{ route('user.add.demography') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            @if($user->birthdate == null)
                                <div class="form-group">
                                    <label>Isi Tanggal Lahir Kamu</label>
                                    <input class="form-control border" type="date" name="birthdate" required>
                                </div>

                                <div class="float-left">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            @endif
                        </form>
                        <div class="p-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
