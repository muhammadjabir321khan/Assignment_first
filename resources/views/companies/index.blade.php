@extends('dashboard.layout')
@section('content')

<div class="container">
    <a href=" {{route('companies.create')}}" data-toggle="modal" data-target="#myModal" class="btn btn-primary mb-2 mx-3">Create Company</a>
    <div id="edit-company-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
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
                                    <h5 class="card-title">Edit Company</h5>
                                </div>
                                <form id="companyForm">
                                    <div class="row g-4">
                                        <input type="hidden" name="id" id="id" class="form-control" value="">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name-1"> Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="full-name-1" name="name" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" col-lg-12">
                                            <div class="form-group">
                                                <label class="form-label" for="email-address-1">Email address</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="email-address-1" name="email" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-label" for="phone-no-1">Image</label>
                                                <div class="form-control-wrap">
                                                    <input type="file" class="form-control" id="phone-no-1" name="image">
                                                    <img id="company-image" src="" alt="Company Image" width="70" class="my-3">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-lg btn-primary save" style="height: 37px;">Update Informations</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="card card-preview">
                                <div class="card-inner">
                                    <div class="table-responsive">
                                        <table id="company" class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Logo</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .table-responsive {
        overflow-x: auto;
    }
</style>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#company').DataTable({
            "responsive": true,
            "processing": false,
            "serverSide": true,
            "ajax": {
                "url": "{{route('companies.index') }}",
                "method": "GET",
                "dataType": "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "name"
                },
                {
                    "data": "email"
                },
                {
                    "data": "logo",
                    "render": function(data, type, row) {
                        return '<img src="/storage/images/' + data + '" width="50" height="50" />';
                    }
                },
                {
                    "data": "action",
                    "orderable": false,
                    "searchable": false
                },

            ]
        });

    });
    $(document).on('click', '.delete-company', function() {
        var table = $(this).data('table');
        var url = $(this).data('url');
        var method = $(this).data('method');
        $.ajax({
            url: url,
            type: method,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                swal.fire(data.success);
                $('#' + table).DataTable().ajax.reload();
            },
            error: function(xhr, status, error) {
                $('.alert-success').text('Data successfully deleted!').fadeIn().delay(3000).fadeOut();
                console.log(xhr.responseText);
            }
        });



    });
    $(document).on('click', '.edit', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '{{ url("companies","")}}' + '/' + id + '/edit',
            method: 'Get',
            success: function(response) {
                console.log(response.data);
                $('#edit-company-modal').modal('show');
                $('#full-name-1').val(response.data.name)
                $('#id').val(response.data.id)
                $('#email-address-1').val(response.data.email)
                $('#company-image').attr('src', "/storage/images/" + response.data.logo);
            }

        });
    });
    $(document).on('click', '.save', function() {
        var form = $(this).closest('form');
        var formData = new FormData(form[0]);
        formData.append('_method', 'PUT');
        $.ajax({
            url: '{{ route("companies.update", ["company" => ":id"]) }}'.replace(':id', $('#id').val()),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                window.location.href = "/companies";
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
</script>
@endsection