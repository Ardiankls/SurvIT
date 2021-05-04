@extends('layouts.app')
@include('surveyor.modal.demographyModal')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <a href="" data-toggle="modal" data-target="#demography" class="btn btn-primary ">Isi Demografi terlebih dahulu</a>
                </div>
            </div>
        </div>
    </div>
@endsection
