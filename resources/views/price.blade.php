@extends('layouts.app')
@section('content')
    <div class="container-xxl p-5">
        <div class="row justify-content-center ">
            <div class="col-md-8 mt-5 ">
                <div class="bg-white text-center rounded-lg shadow d-none d-md-block" style="">
                    <h1 class="p-3">Paket Basic</h1>
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr class="text-center">
                                <th scope="col"></th>
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
                                        {{ $package->consultation }}x
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
                        *Survey yang berbayar cenderung diprioritaskan dan di posisi paling atas dengan poin yang lebih tinggi*
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
                        *Survey yang berbayar cenderung diprioritaskan dan di posisi paling atas dengan poin yang lebih tinggi*
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
