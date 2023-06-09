@extends('dashboard')
@section('content')
@section('title','Add Employee')
<form id="employee-form">
    <div>
        <div class="col-md-10">
            <div id="lname-error" class="text-danger"></div>
            <div class="form-group">
                <label class="form-label" for="fname"> First Name</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname">
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="col-md-10">
            <div id="fname-error" class="text-danger"></div>

            <div class="form-group">
                <label class="form-label" for="fname"> Last Name</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" id="fname" placeholder="First Name" name="lname">
                </div>
            </div>
        </div>
    </div>
    <div class="select-wrapper col-md-10">
        <label for="company">Company:</label>
        <select name="company_id" id="company_id">
            <option value="">Select a company</option>
            @foreach ($companies as $company)
            <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary my-3">Save Employee</button>
</form>
<style>
    .select-wrapper select {
        font-size: 16px;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        width: 100%;
        max-width: 400px;
    }

    .select-wrapper label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }
</style>
@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script>
    $(document).ready(function() {
        $('#employee-form').on('submit', function(e) {
            e.preventDefault();

            var formData = {
                fname: $('#fname').val(),
                lname: $('#lname').val(),
                company_id: $('#company_id').val()
            };

            $.ajax({
                url: '{{ route("employees.store") }}',
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(response) {
                   swal.fire("New Employee is added",response),
                    $('#employee-form')[0].reset();
                },
                error: function(xhr, status, error) {
                    var response = xhr.responseJSON;
                    if (response && response.errors) {
                        $.each(response.errors, function(key, value) {
                            $('#' + key + '-error')
                            $('#' + key + '-error').text(value[0]);
                        });
                    } else {
                        console.log(error);
                    }
                }
            });
        });
    });
</script>