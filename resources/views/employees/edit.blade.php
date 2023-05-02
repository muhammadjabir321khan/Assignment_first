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
                    <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname" value="{{$employee->fname}}">
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
                    <input type="text" class="form-control" id="fname" placeholder="First Name" name="lname"value="{{$employee->lname}}">
                </div>
            </div>
        </div>
    </div>
    <div class="select-wrapper col-md-10">
        <label for="company">Company:</label>
        <select name="company_id" id="company_id">
            <option value="">Select a company</option>
            <!-- @foreach($company  as $company)
            <option value="{{ $company->id }}">{{ $company->company->name}}</option>
            @endforeach -->
        </select>
    </div>
    <button type="submit" class="btn btn-primary my-3">Update Employee</button>
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