@extends('layouts.app')
@section('content')
    <div class="container-xxl  p-5">
        <div class="row justify-content-center ">
            <div class="col-md-9"></div>
            <div class="col-md-8 mt-5 ">
                <div class="bg-white rounded-lg shadow d-none d-md-block" style="">
                    <h1 class="p-3 text-center">Kirim Mail</h1>
                    <form action="{{route('mail.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="container" style="padding: 20px 55px;">
                            <div class="form-group">
                                <div class="form-group"><label>Subject</label>
                                    <input class="form-control" type="text" name="subject"></div>
                                <div class="form-group"><label>Pesan</label>
                                    <textarea class="form-control" rows="3" name="message" required></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
