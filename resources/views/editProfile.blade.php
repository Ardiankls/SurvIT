@extends('layouts.app')
@section('content')
    <div class="container-xxl  p-5">
        <div class="row justify-content-center ">
            <div class="col-md-9"></div>
            <div class="col-md-8 mt-5 ">
                <div class="bg-white rounded-lg shadow d-none d-md-block" style="">
                    <h1 class="p-3 text-center">Edit Profile</h1>
                    <div class="container" style="padding: 20px 55px;">
                        <form action="{{ route('user.update', $user) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">

                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" type="text" name="username" value={{ $user->username }} required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" name="email" value={{ $user->email }} required>
                            </div>

                            <div class="form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" name="first_name" value={{ $user->first_name }} required>
                            </div>

                            <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" name="last_name" value={{ $user->last_name }} required>
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="text" name="phone" value={{ $user->phone }} required>
                            </div>

                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
