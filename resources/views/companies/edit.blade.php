@extends('dashboard')
@section('content')
@section('title','update Company')
<div class="container my-5">
    <form id="companyForm">
        @csrf
        <h5 class="text-center">Update Company</h5>
        <div class="row g-gs">
            <div class="col-md-10">
                <div class="form-group">
                    <label class="form-label" for="name"> Name</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{$company->name}}">
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label class="form-label" for="email"> Email</label>
                    <div class="form-control-wrap">
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{$company->email}}">
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label class="form-label" for="email">Logo</label>
                    <div class="form-control-wrap">
                        <input type="file" class="form-control" id="logo" placeholder="logo" name="image">
                        <img src="{{asset('/storage/images/'.$company->logo)}}" alt="logo" width="100">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success my-3" id="saveBtn">save</button>
    </form>
</div>
@endsection


<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function() {
        $('#companyForm').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            formData.append('_method', 'PUT');

            $.ajax({
                url: '{{ route("companies.update", $company->id) }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#companyForm')[0].reset();                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>