@extends('layouts.app')
@section('content')
    <div class="container-xxl p-5 d-none d-md-block" style="overflow-y:scroll; height:100vh">
        <div class="row justify-content-center ">
            <div class="col-md-10 mt-3">
                <a href="{{ route('admin.index', 1) }}" class="btn btn-secondary">Isi Survei</a>
                <a href="{{ route('admin.index', 2) }}" class="btn btn-secondary">Buat Survei</a>
                <a href="{{ route('admin.index', 3) }}" class="btn btn-secondary">Pembayaran Survei</a>
                <a href="{{ route('admin.index', 4) }}" class="btn btn-secondary">Ambil Poin</a>
                <a href="{{ route('admin.index', 5) }}" class="btn btn-secondary" style="background: blue">Blast Email</a>
                <div id="payment">
                    <div class="bg-white text-center rounded-lg shadow d-none d-md-block">
                        <h1 class="p-3">Blast Email</h1>
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Type</th>
                                    <th scope="col">Last Blast</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>
                                        Blast Age Demography
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        <form
                                            action="{{ route('mail.blast-new-demography', 500) }}"
                                            method="GET" enctype="multipart/form-data">
                                            @csrf
                                            <button class="btn btn-danger" type="submit">
                                                Blast
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>
                                        Blast New Survey to Everyone
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        @php
                                            $survey = null
                                        @endphp
                                        <form
                                            action="{{ route('mail.blast-all-new-survey', 500) }}"
                                            method="GET" enctype="multipart/form-data">
                                            @csrf
                                            <button class="btn btn-danger" type="submit">
                                                Blast
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
