@extends('dashboard')
@section('content')
@section('title','update Company')
<div class="container my-5">
    <div class="nk-block nk-block-lg mb-5">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">Edit Company Details</h4>
                <div class="nk-block-des">
                </div>
            </div>
        </div>
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="card-head">
                    <h5 class="card-title">Eid Company</h5>
                </div>
                <form id="companyForm">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="full-name-1"> Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="full-name-1" name="name" value="{{$company->name}}">
                                </div>
                            </div>
                        </div>
                        <div class=" col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="email-address-1">Email address</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="email-address-1" name="email" value="{{$company->email}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="phone-no-1">Image</label>
                                <div class="form-control-wrap">
                                    <input type="file" class="form-control" id="phone-no-1" name="image">
                                    <img src="{{asset('/storage/images/'.$company->logo)}}" alt="logo" width="100" class="my-2">


                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

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
                    window.location.href = "/companies";
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>