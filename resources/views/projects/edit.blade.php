@extends('dashboard')
@section('content')
@section('title','Add Company')
<div class="container my-5">
    <form id="employee-form">
        <h5 class="text-center">Add Project</h5>
        <div class="row g-gs">
            <div class="col-md-10">
                <div id="name-error" class="text-danger"></div>
                <div class="form-group">
                    <label class="form-label" for="name">Name:</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{$project->name}}">
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div id="email-error" class="text-danger"></div>
                <div class="form-group">
                    <label class="form-label" for="detail">Detaill:</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="detail" placeholder="Project detail" name="detail" value="{{$project->detail}}">
                    </div>

                </div>
            </div>
            <div class="col-md-10">
                <div id="logo-error" class="text-danger"></div>
                <div class="form-group">
                    <label class="form-label" for="totalCost">Total Cost:</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="totalCost" placeholder="Total Cost" name="totalCost" value="{{$project->totalCost}}">
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div id="logo-error" class="text-danger"></div>
                <div class="form-group">
                    <label class="form-label" for="deadline">Deadline:</label>
                    <div class="form-control-wrap">
                        <input type="date" class="form-control" id="deadline" placeholder="deadline" name="deadline" value="{{$project->deadline}}">
                    </div>
                </div>
            </div>
            <div class="select-wrapper col-md-10">
                <label for="company">Employee:</label>
                <select name="employee_id" id="employee_id">
                    @foreach($employies as $employee)
                    <option value="{{ $employee->id }}">
                        {{$employee->fname}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="button" id="update-employee" class="btn btn-primary my-3">Update</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

    <script>
        $(document).ready(function() {
            $('#update-employee').click(function() {
                var formData = new FormData($('#employee-form')[0]);
                formData.append('_method', 'PUT');
                $.ajax({
                    url: '{{ route("projects.update", $project->id) }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire(response.status)
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>