@extends('layouts.app')
@section('content')
    <div class="container-xxl  p-5">
        <div class="row justify-content-center ">
            <div class="col-md-8 mt-3">
                <a href="{{ route('admin.index', 1) }}" class="btn btn-secondary">Isi Survei</a>
                <a href="{{ route('admin.index', 2) }}" class="btn btn-secondary">Buat Survei</a>
                <a href="{{ route('admin.index', 3) }}" class="btn btn-secondary" style="background: blue">Pembayaran Survei</a>
                <a href="{{ route('admin.index', 4) }}" class="btn btn-secondary">Ambil Poin</a>
                <div id="payment">
                    <div class="bg-white text-center rounded-lg shadow d-none d-md-block">
                        <h1 class="p-3">Konfirmasi Pembayaran</h1>
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
                                @foreach ($surveys as $survey)
                                    @if ($survey->status_id == 5)
                                        <tr class="text-center">
                                            <td>
                                                <a href="{{ route('survey.edit', $survey) }}">{{ $survey->title }}</a>
                                            </td>
                                            <td>
                                                {{ $survey->user->username }}
                                            </td>
                                            <td>
                                                {{ $survey->user->email }}
                                            </td>
                                            <td>
                                                <form
                                                    action="{{ route('admin.payment', ['survey' => $survey, 'action' => 'accept']) }}"
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
                                                    action="{{ route('admin.payment', ['survey' => $survey, 'action' => 'decline']) }}"
                                                    method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="PATCH">
                                                    <button class="btn btn-danger" type="submit">
                                                        Decline
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
