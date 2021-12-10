<div class="modal fade  " id="createsurvey" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Buat Survey</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('survey.store') }}" id="dynamic" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="container" style="padding: 20px 55px;">
                        <div class="form-group">
                            <div class="form-group"><label>Judul</label>
                                <input class="form-control" type="text" name="title" required>
                            </div>
                            <div class="form-group"><label>Link Form</label>
                                <input class="form-control" type="text" name="link" required>
                            </div>
                        </div>

                        <div class="form-group"><label>Jenis Kelamin</label>
                            <select name="gender" class="custom-select">
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender->id }}">{{ $gender->gender }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group"><label>Pekerjaan</label>
                            <select name="job" class="custom-select">
                                @foreach ($jobs as $job)
                                    <option value="{{ $job->id }}">{{ $job->job_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group" id="interest"><label>Kesukaan</label>
                            <select name="interest[]" class="custom-select" id="test">
                                @foreach ($interests as $interest)
                                    <option value="{{ $interest->id }}" required>
                                        {{ $interest->interest }} </option>
                                @endforeach
                            </select>
                            <div id="container">
                                <div id="hai"></div>
                            </div>
                            <button type="button" name="add" id="add" class="btn btn-success" onclick="addFields()">Add More</button>
                        </div>

                        <div class="form-group"><label>Provinsi</label>
                            <select name="province" class="custom-select">
                                <option value={{ 1 }} selected>Tidak ada</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->province }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group"><label>Poin</label>
                            <input class="form-control" type="text" name="pay"  required>
                        </div>
                        <div class="form-group"><label>Limit</label>
                            <input class="form-control" type="text" name="limit"  required>
                        </div>

                        <button class="btn btn-primary" type="submit"
                            style="background-color: rgb(221,177,226);">Submit</button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript'>
    // var counter = 2;

    //Once add button is clicked
    function addFields() {
        // Number of inputs to create
        var number = document.getElementById("test").value;
        // Container <div> where dynamic content will be placed
        var container = $("#hai");
        // Add field
        var fieldHTML = '<div><select name="interest[]" class="custom-select" style="width: 90%;">\
                            @foreach ($interests as $interest)\
                                <option value="{{ $interest->id }}" required>\
                                    {{ $interest->interest }} </option>\
                            @endforeach\
                        </select>\
                        <a href="javascript:void(0);" class="remove_button">X</a></div>'

        container.append(fieldHTML);
        // counter++;

        // namenya beda atau array
    }

    // function removeFields() {
    //     e.preventDefault();
    //     $(this).parent('div').remove(); //Remove field html
    //     x--; //Decrement field counter
    // }
    //Once remove button is clicked
    $("#hai").on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        // counter--; //Decrement field counter
    });
</script>
