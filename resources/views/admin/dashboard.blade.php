@extends('layouts.app')
@section('content')
    <div class="container-xxl  p-5">
        <div class="row justify-content-center ">
            <div class="col-md-9"></div>
            <div class="col-md-3 bg-white rounded-lg shadow-sm p-3 no-gutters">
                <div class="row">
                    <div class="col-8">
                        <h2 class="pt-2">POINT: {{ $user->point }}</h2>
                    </div>
                    <div class="col-4 text-center pt-1">
                        <a class=" btn btn-primary" data-toggle="modal" data-target="#getpoint">Ambil</a>
                    </div>
                </div>
            </div>


            <div class="col-md-8 mt-5 ">
                <div class="bg-white text-center rounded-lg shadow d-none d-md-block" style="">
                    <h1 class="p-3">Daftar Survey</h1>
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Survey</th>
                                <th scope="col">User</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usurveys as $usurvey)
                                <tr class="text-center">
                                    <td>
                                        {{ $usurvey->survey->title }}
                                    </td>
                                    <td>
                                        {{ $usurvey->user->username }}
                                    </td>
                                    <td>
                                        @if ($usurvey->status == '2')
                                            Pending
                                        @else

                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('usersurvey.update', $usurvey->user_id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input name="_method" type="hidden" value="PATCH">
                                            <button class="btn btn-primary" id="selesai" type="submit">
                                                Selesai
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
