@extends('layouts.app')

@section('content')
    @include('poster.modal.createModal')
<div class="container-fluid">

    <div class="p-5">
        <div class="row">
            <div class="col-md-10 text-right">
                <a href="" data-toggle="modal" data-target="#createsurvey" class="btn btn-primary ">Buat Survey</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-2"></div>
            <div class="col-sm-8 text-center bg-danger">
                <div class="rounded bg-danger">

                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="row bg-danger ">--}}
{{--                <div class="col-4"></div>--}}
{{--                <div class="col-4"></div>--}}
{{--                <div class="col-4"><a href="" data-toggle="modal" data-target="#demography" class="btn btn-primary ">Buat Survey</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--                <h1>Your Recent Surveys</h1>--}}

{{--            <div class="card m-3" style="min-heigth: 15rem;">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-4">--}}
{{--                        <img class="d-block w-100" src="" alt="ImageGonBeHere">--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-8">--}}
{{--                        <h3 style="font-style: italic;">Add New Survey</h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card m-3">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-4">--}}
{{--                        <img class="d-block w-100" src="" alt="ImageGonBeHere">--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-8">--}}
{{--                        <h3 style="font-style: italic;">Survey Title</h3>--}}
{{--                        <p>Date created</p>--}}
{{--                        <p>Clicked times</p>--}}
{{--                        <p>Point</p>--}}
{{--                        <a class="btn btn-success">Edit</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
@endsection
