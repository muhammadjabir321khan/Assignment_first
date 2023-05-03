@extends('dashboard')
@section('content')
@section('title','Add Company')
<div class="container my-5">
    <form id="companyForm">
        <h5 class="text-center">Add Project</h5>
        <div class="row g-gs">
            <div class="col-md-10">
                <div id="name-error" class="text-danger"></div>
                <div class="form-group">
                    <label class="form-label" for="name">Name:</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" class="@error('name') is-invalid @enderror">
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div id="email-error" class="text-danger"></div>
                <div class="form-group">
                    <label class="form-label" for="detail">Detaill:</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="detail" placeholder="Project detail" name="detail">
                    </div>

                </div>
            </div>
            <div class="col-md-10">
                <div id="logo-error" class="text-danger"></div>
                <div class="form-group">
                    <label class="form-label" for="totalCost">Total Cost:</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="totalCost" placeholder="Total Cost" name="totalCost">
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div id="logo-error" class="text-danger"></div>
                <div class="form-group">
                    <label class="form-label" for="deadline">Deadline:</label>
                    <div class="form-control-wrap">
                        <input type="date" class="form-control" id="deadline" placeholder="deadline" name="deadline">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success my-3">save</button>
    </form>
</div>
@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function() {
        $('#companyForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{url('projects')}}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#companyForm')[0].reset();
                    alert(data.company);

                },
                error: function(xhr, status, error) {
                    var response = xhr.responseJSON;
                    if (response && response.errors) {
                        $.each(response.errors, function(key, value) {
                            if (key == 'email' && value[0] == 'The email has already been taken.') {
                                $('#' + key + '-error').text('Email is already taken.');
                            } else {
                                $('#' + key + '-error').text(value[0]);
                            }
                        });
                    } else {
                        console.log(error);
                    }
                }

            });
        });
    });
</script>
