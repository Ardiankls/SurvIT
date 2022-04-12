@extends('layouts.app')
@section('content')
    <div class="container-xxl p-5" style="overflow-y:scroll; height:100vh">
        <div class="row justify-content-center ">
            <div class="col-md-8 mt-3">
                <a href="{{ route('admin.index', 1) }}" class="btn btn-secondary" style="background: blue">Isi Survei</a>
                <a href="{{ route('admin.index', 2) }}" class="btn btn-secondary">Buat Survei</a>
                <a href="{{ route('admin.index', 3) }}" class="btn btn-secondary">Pembayaran Survei</a>
                <a href="{{ route('admin.index', 4) }}" class="btn btn-secondary">Ambil Poin</a>
                <div id="usurvey">
                    <div class="bg-white text-center rounded-lg shadow d-none d-md-block">
                        <h1 class="p-3">Konfirmasi Mengisi Survei</h1>
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Survei</th>
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
                                            <a
                                                href="{{ route('survey.edit', $usurvey->usersurvey->survey) }}">{{ $usurvey->usersurvey->survey->title }}</a>
                                        </td>
                                        <td>
                                            {{ $usurvey->usersurvey->user->username }}
                                        </td>
                                        <td>
                                            {{ $usurvey->usersurvey->user->email }}
                                        </td>
                                        <td>
                                            <form
                                                action="{{ route('admin.usurvey', ['usurvey' => $usurvey, 'action' => 'accept']) }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input name="_method" type="hidden" value="PATCH">
                                                <button class="btn btn-primary" type="submit">
                                                    Accept
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form
                                                action="{{ route('admin.usurvey', ['usurvey' => $usurvey, 'action' => 'decline']) }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input name="_method" type="hidden" value="PATCH">
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
    </div>
@endsection
