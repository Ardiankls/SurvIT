@extends('layouts.app')
@section('content')
    {{-- MOBILE --}}
    <div class="container-xxl p-5 d-md-none">
        <div class="row justify-content-center">
            <div style="overflow-y:scroll; height:100vh;">
                <div class="container-fluid p-2 mb-5">
                    <div class="container bg-white shadow p-2 mb-4" style="border-radius: 15px;">
                        <h4 class="text-center">Daftar Paket</h4>
                    </div>
                    <div class="container bg-white no-gutters shadow pr-4 pl-4 pt-4 pb-3 mb-4" style="border-radius: 15px;">
                        <div class="text-danger pb-3">
                            *Survey yang berbayar cenderung diprioritaskan dan di posisi paling atas dengan poin yang lebih
                            tinggi*
                        </div>
                    </div>
                    @foreach ($packagesB as $package)
                        <div class="card-list w-100 no-gutters d-md-none ">
                            <div class="container bg-white no-gutters shadow pr-4 pl-4 pt-4 pb-3 mb-4"
                                style="border-radius: 15px;">
                                <div class="row">
                                    <div class="col-9">
                                        <h5 class="font-weight-bolder">
                                            {{ $package->description }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        Respondent: {{ $package->respondent }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        Konsultasi: {{ $package->consultation }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        {{ $package->duration }}
                                    </div>
                                </div>
                                <div class="row mt-2 ">
                                    <div class="col-5 mt-1 ">
                                        <i class="fas fa-coins mr-1"></i>
                                        {{ $package->price }}
                                    </div>
                                    <div class="col-7 no-gutters text-right ">
                                        <div class="row">
                                            <div class="col-12 no-gutters text-right ">
                                                Dibuat Mandiri
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @foreach ($packagesC as $package)
                        <div class="card-list w-100 no-gutters d-md-none ">
                            <div class="container bg-white no-gutters shadow pr-4 pl-4 pt-4 pb-3 mb-4"
                                style="border-radius: 15px;">
                                <div class="row">
                                    <div class="col-9">
                                        <h5 class="font-weight-bolder">
                                            {{ $package->description }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        Respondent: {{ $package->respondent }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        Konsultasi: {{ $package->consultation }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        {{ $package->duration }}
                                    </div>
                                </div>
                                <div class="row mt-2 ">
                                    <div class="col-5 mt-1 ">
                                        <i class="fas fa-coins mr-1"></i>
                                        {{ $package->price }}
                                    </div>
                                    <div class="col-7 no-gutters text-right ">
                                        <div class="row">
                                            <div class="col-12 no-gutters text-right ">
                                                Dibuat Tim Survit
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- DESKTOP --}}
    <div class="container-xxl p-5 d-none d-md-block" style="overflow-y: scroll; height:100vh;">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5 d-none d-md-block">
                <div class="bg-white text-center rounded-lg shadow d-none d-md-block" style="">
                    <h1 class="p-3">Paket Basic</h1>
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr class="text-center">
                                <th scope="col"></th>
                                <th scope="col">Free</th>
                                <th scope="col">Basic A</th>
                                <th scope="col">Basic B</th>
                                <th scope="col">Basic C</th>
                                <th scope="col">Basic D</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>
                                    Respondent
                                </td>
                                @foreach ($packagesB as $package)
                                    <td>
                                        {{ $package->respondent }}
                                    </td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>
                                    Demography Mapping
                                </td>
                                @foreach ($packagesB as $package)
                                    <td>
                                        Iya
                                    </td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>
                                    Waktu
                                </td>
                                @foreach ($packagesB as $package)
                                    <td>
                                        {{ $package->duration }}
                                    </td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>
                                    Report and Visualization
                                </td>
                                @foreach ($packagesB as $package)
                                    <td>
                                        Google Form
                                    </td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>
                                    Konsultasi
                                </td>
                                @foreach ($packagesB as $package)
                                    <td>
                                        {{ $package->consultation }}
                                    </td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>
                                    Survey Form
                                </td>
                                @foreach ($packagesB as $package)
                                    <td>
                                        By Yourself
                                    </td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>
                                    Harga
                                </td>
                                @foreach ($packagesB as $package)
                                    <td>
                                        {{ $package->price }}
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-danger pb-3">
                        *Survey yang berbayar cenderung diprioritaskan dan di posisi paling atas dengan poin yang lebih
                        tinggi*
                    </div>
                </div>
                <br>
                <div class="bg-white text-center rounded-lg shadow d-none d-md-block" style="">
                    <h1 class="p-3">Paket Custom</h1>
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr class="text-center">
                                <th scope="col"></th>
                                <th scope="col">Custom A</th>
                                <th scope="col">Custom B</th>
                                <th scope="col">Custom C</th>
                                <th scope="col">Custom D</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>
                                    Respondent
                                </td>
                                @foreach ($packagesC as $package)
                                    <td>
                                        {{ $package->respondent }}
                                    </td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>
                                    Demography Mapping
                                </td>
                                @foreach ($packagesC as $package)
                                    <td>
                                        Iya
                                    </td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>
                                    Waktu
                                </td>
                                @foreach ($packagesC as $package)
                                    <td>
                                        {{ $package->duration }}
                                    </td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>
                                    Report and Visualization
                                </td>
                                @foreach ($packagesC as $package)
                                    <td>
                                        Google Form
                                    </td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>
                                    Konsultasi
                                </td>
                                @foreach ($packagesC as $package)
                                    <td>
                                        {{ $package->consultation }}x
                                    </td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>
                                    Survey Form
                                </td>
                                @foreach ($packagesC as $package)
                                    <td>
                                        By Our Team
                                    </td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>
                                    Harga
                                </td>
                                @foreach ($packagesC as $package)
                                    <td>
                                        {{ $package->price }}
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-danger pb-3">
                        *Survey yang berbayar cenderung diprioritaskan dan di posisi paling atas dengan poin yang lebih
                        tinggi*
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
