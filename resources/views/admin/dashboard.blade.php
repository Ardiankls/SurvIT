@extends('layouts.app')
@section('content')
    <div class="container-xxl  p-5">
        <div class="row justify-content-center ">
            <div class="col-md-9"></div>
            <div class="col-md-8 mt-5 ">
                <div class="bg-white text-center rounded-lg shadow d-none d-md-block" style="">
                    <h1 class="p-3">Konfirmasi Survey</h1>
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Survey</th>
                                <th scope="col">User</th>
                                <th scope="col">Email</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
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
                                        {{ $usurvey->user->email }}
                                    </td>
                                    <td>
                                        <form action="{{ route('usersurvey.update', $usurvey) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input name="_method" type="hidden" value="PATCH">
                                            <button class="btn btn-primary" id="selesai" type="submit">
                                                Accept
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('mail.destroy', $usurvey) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">
                                                Decline
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
