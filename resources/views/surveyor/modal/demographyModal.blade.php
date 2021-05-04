<div class="modal fade" id="demography" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Isi Demografi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="container" style="padding: 20px 55px;">
                        <div class="form-group"><label>Jenis Kelamin</label>
                            <select name="course_name" class="custom-select">
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender->id }}" required>
                                        {{ $gender->gender }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group"><label>Pekerjaan</label>
                            <select name="course_name" class="custom-select">
                                {{--                                @foreach ($courses as $course)--}}
                                {{--                                    <option value="{{ $course->id }}" required>--}}
                                {{--                                        {{ $course->courses->name }} </option>--}}
                                {{--                                @endforeach--}}
                            </select>
                        </div>
                        <div class="form-group"><label>Kesukaan</label>
                            <select name="course_name" class="custom-select">
                                {{--                                @foreach ($courses as $course)--}}
                                {{--                                    <option value="{{ $course->id }}" required>--}}
                                {{--                                        {{ $course->courses->name }} </option>--}}
                                {{--                                @endforeach--}}
                            </select>
                        </div>

                        <button
                            class="btn btn-primary" type="submit" style="background-color: rgb(221,177,226);">Submit
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
