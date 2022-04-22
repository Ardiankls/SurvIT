@extends('layouts.app')
@section('content')
    <div class="container-xxl p-5 d-none d-md-block" style="overflow-y:scroll; height:100vh">
        <div class="row justify-content-center ">
            <div class="col-md-10 mt-3">
                <a href="{{ route('admin.index', 1) }}" class="btn btn-secondary">Isi Survei</a>
                <a href="{{ route('admin.index', 2) }}" class="btn btn-secondary">Buat Survei</a>
                <a href="{{ route('admin.index', 3) }}" class="btn btn-secondary">Pembayaran Survei</a>
                <a href="{{ route('admin.index', 4) }}" class="btn btn-secondary" style="background: blue">Ambil Poin</a>
                <div id="point">
                    <div class="bg-white text-center rounded-lg shadow d-none d-md-block">
                        <h1 class="p-3">Konfirmasi Pengambilan Poin</h1>
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">User</th>
                                    <th scope="col">Bank</th>
                                    <th scope="col">Rekening</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($upoints as $upoint)
                                    <tr class="text-center">
                                        <td>
                                            {{ $upoint->payment->user->username }}
                                        </td>
                                        <td>
                                            {{ $upoint->payment->bank }}
                                        </td>
                                        <td>
                                            {{ $upoint->payment->transfer }}
                                        </td>
                                        <td>
                                            {{ $upoint->payment->value }}
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.point', $upoint) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input name="_method" type="hidden" value="PATCH">
                                                <button class="btn btn-primary" id="selesai" type="submit">
                                                    Finish
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
