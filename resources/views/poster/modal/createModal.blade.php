<div class="modal fade" id="createsurvey" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Buat Survey</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="survey.store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="container" style="padding: 20px 55px;">
                        <div class="form-group">
                            <div class="form-group"><label>Judul</label>
                                <input class="form-control" type="text" name="survey_name" required></div>
                            <div class="form-group"><label>Link Form</label>
                                <input class="form-control" type="text" name="form_link" required>
                            </div>
                            <label>Jenis Kelamin</label>
                            <select name="gender" class="custom-select">
{{--                                @foreach ($genders as $gender)--}}
{{--                                    <option value="{{ $gender->id }}">{{ $gender->gender }}</option>--}}
{{--                                @endforeach--}}
                            </select>
                        </div>

                        <div class="form-group"><label>Pekerjaan</label>
                            <select name="course_name" class="custom-select">
{{--                                @foreach ($jobs as $job)--}}
{{--                                    <option value="{{ $job->id }}">{{ $job->job_name }}</option>--}}
{{--                                @endforeach--}}
                            </select>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dynamic_field">Kesukaan
                                <tr>
                                    <td>
                                        <select name="creator_team1" class="custom-select">
{{--                                            @foreach ($interests as $interest)--}}
{{--                                                <option value="{{ $interest->id }}" required>--}}
{{--                                                    {{ $interest->interest }} </option>--}}
{{--                                            @endforeach--}}
                                        </select>
                                    </td>
                                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                </tr>
                            </table>
                        </div>

                        <button class="btn btn-primary" type="submit" style="background-color: rgb(221,177,226);">Submit
                        </button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

