@extends('dashboard.layout')
@section('content')
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Company</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="companyForm">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="full-name-1"> Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="full-name-1" name="name">
                                </div>
                                <div id="name-error" class="text-danger"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="email-address-1">Email address</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="email-address-1" name="email">
                                </div>
                                <div id="email-error" class="text-danger"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="phone-no-1">Image</label>
                                <div class="form-control-wrap">
                                    <input type="file" class="form-control" id="phone-no-1" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save Informations</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div id="modal-loader" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <div id="modal-content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<a href=" {{route('companies.create')}}" data-toggle="modal" data-target="#myModal" class="btn btn-primary mb-2 mx-3">Create Company</a>
<div id="edit-company-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Company</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="container my-2">
                <form id="companyForm">
                    <div class="row g-4">
                        <input type="hidden" name="id" id="id" class="form-control" value="">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="full-name-1"> Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="name" name="name" value="">
                                </div>
                            </div>
                        </div>
                        <div class=" col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="email-address-1">Email address</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="email" name="email" value="">
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
                                <button type="button" class="btn btn-lg btn-primary mb-1 save" style="height: 37px;">Update Informations</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
    /* .table-responsive {
        overflow-x: auto;
    } */

    .myCustomButtonContainer {
        display: flex;
        justify-content: flex-end;
        margin-top: 10px;
    }

    .myCustomButtonContainer button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        margin-right: 136px;


    }

    .myCustomButtonContainer button:hover {
        background-color: #0056b3;
    }

    /* Optional: adjust the column width for the button container */
    .dataTables_wrapper .col-md-6:last-child {
        width: auto;
        flex: 0 0 auto;
    }
</style>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#companyForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{url('companies')}}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    toastr.success('Data added successfully!', 'Success', {
                        positionClass: 'toast-top-left'
                    });

                    window.location.href = "/companies";
                    $('#companyForm')[0].reset();

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
        $('#company').DataTable({
            "responsive": true,
            "processing": false,
            "serverSide": true,
            "dom": '<"row"<"col-md-4"l><"col-md-4"<"myCustomButtonContainer">><"col-md-4"f>>t<"row"<"col-md-8"i><"col-md-4"p>>',
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
                    "searchable": false,
                    "button": false
                },

            ],
            "initComplete": function(settings, json) {
                $('.myCustomButtonContainer').html('<button id="myCustomButton" >Click Me</button>');
                $('#myCustomButton').on('click', function() {
                    alert('Button clicked!');
                });
            }
        });
        // $('#company thead th:last-child').append('<button id="myButton">Click Me</button>');


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
                $('#name').val(response.data.name)
                $('#id').val(response.data.id)
                $('#email').val(response.data.email)
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