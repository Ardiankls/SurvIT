@extends('layouts.app')
@section('content')
    <div class="container-xxl  p-5">
        <div class="row justify-content-center ">
            <div class="col-md-9"></div>

            <div class="col-md-8 mt-5">
                <div class="bg-white rounded-lg shadow d-none d-md-block" style="">
                    <div>
                        <div class="float-left pt-3 pl-3">
                            <h4>Profile</h4>
                        </div>
                        <div class="float-right pt-3 pr-3">
                            <a href="{{ route('user.edit', $user) }}" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                    <div class="p-5"></div>
                    <div class="text-center">
                        <img style="width: 20%;" src="/images/profile.png" alt="">
                    </div>
                    <div class="p-3"></div>
                    <div class="col text-center">
                        <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>
                        <h4>{{ $user->email }}</h4><br>
                        First Name: {{ $user->first_name }}<br>
                        Last Name: {{ $user->last_name }}<br>
                        Phone: {{ $user->phone }}<br>
                    </div>
                    <div class="p-5"></div>
                </div>
            </div>

            <div class="col-md-8 mt-5">
                <div class="bg-white rounded-lg shadow d-none d-md-block" style="">
                    <div>
                        <div class="float-left pt-3 pl-3">
                            <h4>Demography</h4>
                        </div>
                        <div class="float-right pt-3 pr-3">
                            <a href="{{ route('user.edit', $user) }}" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                    <div class="p-5"></div>
                    <div class="col text-center">
                        Jenis Kelamin: {{ $user->gender->gender ?? 'null' }}<br>
                        Pekerjaan: {{ $user->jobs->first()->job_name ?? 'null' }}<br>
                        Kesukaan / Topik / Hobi: {{ $user->interests->first()->interest ?? 'null' }}<br>
                        Provinsi: {{ $user->province->province ?? 'null' }}<br>
                    </div>
                    <div class="p-4"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
