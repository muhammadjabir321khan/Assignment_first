@extends('dashboard')
@section('content')

<div class="container">
    <a href="#" class="btn btn-primary mx-5" data-toggle="modal" data-target="#myModal2">create project</a>
    <div id="edit-company-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="container my-5">
                    <div class="nk-block nk-block-lg mb-5">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="title nk-block-title">Edit Project Details</h4>
                                <div class="nk-block-des">
                                </div>
                            </div>
                        </div>
                        <div class="nk-block nk-block-lg mb-5">
                            <div class="card card-bordered mx-5">
                                <div class="card-inner ">
                                    <form id="companyForm">
                                        <h5 class="text-center">Edit Project</h5>
                                        <div class="row g-gs">
                                            <div class="col-md-10">
                                                <div id="name-error" class="text-danger"></div>
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Name:</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="">
                                                    </div>
                                                    <div class="form-control-wrap">
                                                        <input type="hidden" class="form-control" id="id" placeholder="Name" name="id" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div id="email-error" class="text-danger"></div>
                                                <div class="form-group">
                                                    <label class="form-label" for="detail">Detaill:</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="detail" placeholder="Project detail" name="detail" value="">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div id="logo-error" class="text-danger"></div>
                                                <div class="form-group">
                                                    <label class="form-label" for="totalCost">Total Cost:</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="totalCost" placeholder="Total Cost" name="totalCost" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div id="logo-error" class="text-danger"></div>
                                                <div class="form-group">
                                                    <label class="form-label" for="deadline">Deadline:</label>
                                                    <div class="form-control-wrap">
                                                        <input type="date" class="form-control" id="deadline" placeholder="deadline" name="deadline" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="select-wrapper col-md-10">
                                                <label for="company">Company:</label>
                                                <select name="employee_id" id="employee_id">
                                                    <option value="">Select a employees</option>

                                                </select>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success my-3 save">save</button>
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
                                        <table id="table" class="datatable-init nowrap table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Detail</th>
                                                    <th>totalCast</th>
                                                    <th>deadLine</th>
                                                    <th>Employee</th>
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

@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            "processing": false,
            "serverSide": true,
            "ajax": {
                "url": "{{route('projects.index')}}",
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
                    "data": "detail"
                },
                {
                    "data": "totalCost"
                },
                {
                    "data": "deadline"
                },
                {
                    "data": "employee"
                },

                {
                    "data": "action",
                    "orderable": false,
                    "searchable": false
                }


            ]
        });

        $(document).on('click', '.delete-project', function() {
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
                    $('#' + table).DataTable().ajax.reload();
                    swal.fire(data.status);

                },
                error: function(xhr, status, error) {}
            });

        });
    });

    $(document).on('click', '.edit', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '{{ url("projects","")}}' + '/' + id + '/edit',
            method: 'Get',
            success: function(response) {
                console.log(response.employee);
                $('#edit-company-modal').modal('show');
                $('#id').val(response.project.id);
                $('#name').val(response.project.name)
                $('#detail').val(response.project.detail)
                $('#totalCost').val(response.project.totalCost)
                $('#deadline').val(response.project.deadline)
                var employeeSelect = $('#employee_id');
                response.employee
                    .forEach(function(employee) {
                        var option = $('<option>').attr('value', employee.id).text(employee.fname);
                        employeeSelect.append(option);
                    });

            }

        });
    });
    $(document).on('click', '.save', function() {
        var form = $(this).closest('form');
        var formData = new FormData(form[0]);
        formData.append('_method', 'PUT');
        $.ajax({
            url: '{{ route("projects.update", ["project" => ":id"]) }}'.replace(':id', $('#id').val()),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                window.location.href = "/projects";
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
</script>