@extends('layouts.app')
@section('content')
    <div class="container-xxl  p-5">
        <div class="row justify-content-center ">
            <div class="col-md-8 mt-3">
                <button id="isi" class="btn btn-primary">Isi Survei</button>
                <button id="isi" class="btn btn-secondary">Buat Survei</button>
                <button id="isi" class="btn btn-secondary">Pembayaran Survei</button>
                <button id="isi" class="btn btn-secondary">Ambil Poin</button>
                <div class="bg-white text-center rounded-lg shadow d-none d-md-block" id="usurvey">
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
                <div class="bg-white text-center rounded-lg shadow d-none d-md-block" id="survey">
                    <h1 class="p-3">Konfirmasi Pembuatan Survei</h1>
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
                                @if ($survey->status_id == 2)
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
                                                action="{{ route('admin.survey', ['survey' => $survey, 'action' => 'accept']) }}"
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
                                                action="{{ route('admin.survey', ['survey' => $survey, 'action' => 'decline']) }}"
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
                <div class="bg-white text-center rounded-lg shadow d-none d-md-block" id="upayment">
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
                <div class="bg-white text-center rounded-lg shadow d-none d-md-block" id="upayment">
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
@endsection
