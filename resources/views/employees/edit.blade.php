@extends('dashboard')
@section('content')
@section('title','Edit Employee')
<form id="employee-form">
    <div>
        <div class="col-md-10">
            <div id="lname-error" class="text-danger"></div>
            <div class="form-group">
                <label class="form-label" for="fname"> First Name</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" id="lname" placeholder="Last Name" name="fname" value="{{$employee->fname}}">
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
                    <input type="text" class="form-control" id="fname" placeholder="First Name" name="lname" value="{{$employee->lname}}">
                </div>
            </div>
        </div>
    </div>
    <div class="select-wrapper col-md-10">
        <label for="company">Company:</label>
        <select name="company_id" id="company_id">
            @foreach($companies as $company)
            <option value="{{ $company->id }}">
                {{$company->name}}
            </option>
            @endforeach
        </select>
    </div>
    <button type="button" id="update-employee" class="btn btn-primary my-3">Update Employee</button>
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
<script>
    $(document).ready(function() {
        $('#update-employee').click(function() {
            var formData = new FormData($('#employee-form')[0]);
            formData.append('_method', 'PUT');
            $.ajax({
                url: '{{ route("employees.update", $employee->id) }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    window.location.href = "/employees";
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
