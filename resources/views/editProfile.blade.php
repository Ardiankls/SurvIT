@extends('layouts.app')
@section('content')
    {{-- MOBILE --}}
    <div class="container-xxl d-md-none" style="overflow-y:scroll; height:100vh">
        <div class="row justify-content-center">
            <div class="col-md-9"></div>
            <div class="col-md-8 pt-2 mt-5 mb-2">
                <div class="bg-white rounded-lg shadow" style="">
                    <h3 class="p-3 text-center">Edit Profile</h3>
                    <div class="container" style="padding: 20px 30px;">
                        <form action="{{ route('user.update', 'profile') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">

                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control border" type="text" name="username"
                                    value={{ $user->username }} readonly>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control border" type="text" name="email" value={{ $user->email }}
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label>First Name</label>
                                <input class="form-control border" type="text" name="first_name"
                                    value={{ $user->first_name }} required>
                            </div>

                            <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control border" type="text" name="last_name"
                                    value={{ $user->last_name }} required>
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control border" type="text" name="phone" value={{ $user->phone }}
                                    required>
                            </div>

                            <button class="btn btn-primary" type="submit" onclick="this.disabled=true;this.form.submit();">Simpan</button>
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
            <div class="col-md-8 mt-5 ">
                <div class="bg-white rounded-lg shadow">
                    <h1 class="p-3 text-center">Edit Profile</h1>
                    <div class="container" style="padding: 20px 55px;">
                        <form action="{{ route('user.update', 'profile') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">

                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control border" type="text" name="username"
                                    value={{ $user->username }} readonly>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control border" type="text" name="email" value={{ $user->email }}
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label>First Name</label>
                                <input class="form-control border" type="text" name="first_name"
                                    value={{ $user->first_name }} required>
                            </div>

                            <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control border" type="text" name="last_name"
                                    value={{ $user->last_name }} required>
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control border" type="text" name="phone" value={{ $user->phone }}
                                    required>
                            </div>

                            <button class="btn btn-primary" type="submit" onclick="this.disabled=true;this.form.submit();">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
