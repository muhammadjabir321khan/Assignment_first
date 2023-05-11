@extends('dashboard')
@section('content')
@can('create companies')




<div class="container">
    <a href="{{ route('employees.create') }}" data-toggle="modal" data-target="#myModal1" class="btn btn-primary mx-5">create employee</a>
    <div id="edit-company-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="container my-5">
                    <div class="nk-block nk-block-lg mb-5">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="title nk-block-title">Edit employee Details</h4>
                                <div class="nk-block-des">
                                </div>
                            </div>
                        </div>
                        <div class="nk-block nk-block-lg mb-5">
                            <div class="card card-bordered mx-5">
                                <div class="card-inner ">
                                    <div class="card-head">
                                        <h5 class="card-title">Add Employee</h5>
                                    </div>
                                    <form id="employee-form">
                                        <div>
                                            <div class="col-md-10">
                                                <input type="hidden" name="id" id="id">
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
                                                        <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="select-wrapper col-md-10">
                                            <label for="company">Company:</label>
                                            <select name="company_id" id="company_id">
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-primary my-3 save">Save Employee</button>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                                        <table id="companies-table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>FName</th>
                                                    <th>lname</th>
                                                    <th>company</th>
                                                    <th>project</th>
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
@endcan


@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script>
    $(document).ready(function() {
        $('#companies-table').DataTable({
            "processing": false,
            "serverSide": true,
            "ajax": {
                "url": "{{route('employees.index') }}",
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
                    "data": "fname"
                },
                {
                    "data": "lname"
                },
                {
                    "data": "company"
                },
                {
                    "data": "projects"
                },
                {
                    "data": "action",
                    "orderable": false,
                    "searchable": false
                }
            ]
        });

        $(document).on('click', '.delete-record', function() {
            var table = $(this).data('table');
            var url = $(this).data('url');
            var method = $(this).data('method');
            console.log(table)
            $.ajax({
                url: url,
                type: method,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    // console.log(data)
                    swal.fire(data.success);
                    $('#' + table).DataTable().ajax.reload();
                },
                error: function(xhr, status, error) {
                    $('.alert-success').text('Data successfully deleted!').fadeIn().delay(3000).fadeOut();

                    console.log(xhr.responseText);
                }
            });

        });

    });
    $(document).on('click', '.edit', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '{{ url("employees","")}}' + '/' + id + '/edit',
            method: 'Get',
            success: function(response) {
                console.log("response", response.employee.id)
                // console.log(response.data);
                $('#edit-company-modal').modal('show');
                $('#id').val(response.employee.id);
                $('#lname').val(response.employee.lname)
                $('#fname').val(response.employee.fname)
                var companySelect = $('#company_id');
                response.comapnies
                    .forEach(function(company) {
                        var option = $('<option>').attr('value', company.id).text(company.name);
                        companySelect.append(option);
                    });

            }

        });
    });
    $(document).on('click', '.save', function() {

        console.log("click")
        var form = $(this).closest('form');
        var formData = new FormData(form[0]);
        formData.append('_method', 'PUT');
        $.ajax({
            url: '{{ route("employees.update", ["employee" => ":id"]) }}'.replace(':id', $('#id').val()),
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

    $(document).on('click', '.delete', function(event) {
        event.preventDefault();
        var table = $(this).data('table');
        var url = $(this).data('url');
        var method = $(this).data('method');
        if (swal("Are you sure you want to delete this employee?")) {
            $.ajax({
                url: url,
                type: method,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    swalfire(data.success);
                    console.log("table", table)
                    $('#' + table).DataTable().ajax.reload();
                },
                error: function(xhr, status, error) {

                    console.log(xhr.responseText);
                }
            });
        }
    });
</script>