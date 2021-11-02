@extends('layouts.app')
@section('content')
    <div class="container-xxl  p-5">
        <div class="row justify-content-center ">
            <div class="col-md-9"></div>
            <div class="col-md-8 mt-5 ">
                <div class="bg-white rounded-lg shadow d-none d-md-block" style="">
                    <h1 class="p-3 text-center">Edit Survey</h1>
                    <div class="container" style="padding: 20px 55px;">
                        <form action="{{ route('survey.update', $survey) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">

                            <div class="form-group">
                                <label>Judul</label>
                                <input class="form-control" type="text" name="title" value={{ $survey->title }} required>
                            </div>

                            <div class="form-group">
                                <label>Link Form</label>
                                <input class="form-control" type="text" name="link" value={{ $survey->link }} required>
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="gender" class="custom-select">
                                    @foreach ($genders as $gender)
                                        <?php
                                        $selected = '';
                                        if ($survey->gender_id == $gender->id) {
                                            $selected = 'selected';
                                        }
                                        ?>
                                        <option value="{{ $gender->id }}" {{ $selected }}>{{ $gender->gender }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <select name="job" class="custom-select">
                                    @foreach ($jobs as $job)
                                        <?php
                                        $selected = '';
                                        if ($survey->jobs->first()->id == $job->id) {
                                            $selected = 'selected';
                                        }
                                        ?>
                                        <option value="{{ $job->id }}" {{ $selected }}>{{ $job->job_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dynamic_field">Kesukaan
                                    <tr>
                                        <td>
                                            <select name="interest" class="custom-select">
                                                @foreach ($interests as $interest)
                                                    <?php
                                                    $selected = '';
                                                    if ($survey->interests->first()->id == $interest->id) {
                                                        $selected = 'selected';
                                                    }
                                                    ?>
                                                    <option value="{{ $interest->id }}" {{ $selected }}>
                                                        {{ $interest->interest }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><button type="button" name="add" id="add" class="btn btn-success">Add
                                                More</button></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="form-group">
                                <label>Provinsi</label>
                                <select name="province" class="custom-select">
                                    @foreach ($provinces as $province)
                                        <?php
                                        $selected = '';
                                        if ($survey->provinces->first()->id == $province->id) {
                                            $selected = 'selected';
                                        }
                                        ?>
                                        <option value="{{ $province->id }}" {{ $selected }}>
                                            {{ $province->province }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Poin</label>
                                <input class="form-control" type="text" name="pay" value={{ $survey->pay }}>
                            </div>

                            <div class="form-group">
                                <label>Limit</label>
                                <input class="form-control" type="text" name="limit" value={{ $survey->limit }}>
                            </div>
                            <div class="float-left">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>

                        <div class="float-right">
                            <form action="{{ route('survey.destroy', $survey) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        <div class="p-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
