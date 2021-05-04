@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Your Recent Surveys</h1>
            <div class="card m-3" style="min-heigth: 15rem;">
                <div class="row">
                    <div class="col-sm-4">
                        <img class="d-block w-100" src="" alt="ImageGonBeHere">
                    </div>
                    <div class="col-sm-8">
                        <h3 style="font-style: italic;">Add New Survey</h3>
                    </div>
                </div>
            </div>
            <div class="card m-3">
                <div class="row">
                    <div class="col-sm-4">
                        <img class="d-block w-100" src="" alt="ImageGonBeHere">
                    </div>
                    <div class="col-sm-8">
                        <h3 style="font-style: italic;">Survey Title</h3>
                        <p>Date created</p>
                        <p>Clicked times</p>
                        <p>Point</p>
                        <a class="btn btn-success">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
