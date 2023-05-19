@extends('dashboard.layout')
@section('content')
<div class="container">
    <!-- .Edit Modal-Content -->
    <div class="modal fade" id="myModal2">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body modal-body-md">
                    <h5 class="modal-title">Add Employee</h5>
                    <form id="companyForm1" class="mx-5">
                        <h5 class="text-center">Add Project</h5>
                        <div class="row g-gs">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">Name:</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" class="@error('name') is-invalid @enderror">
                                    </div>
                                    <div id="pname"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="detail">Detail:</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="detail" placeholder="Project detail" name="detail">
                                    </div>
                                    <div id="pdetail"></div>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div id="logo-error" class="text-danger"></div>
                                <div class="form-group">
                                    <label class="form-label" for="totalCost">Total Cost:</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="totalCost" placeholder="Total Cost" name="totalCost">
                                    </div>
                                </div>
                                <div id="ptotalCost" class="text-danger"></div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="deadline">Deadline:</label>
                                    <div class="form-control-wrap">
                                        <input type="date" class="form-control" id="deadline" placeholder="deadline" name="deadline">
                                    </div>
                                </div>
                                <div id="pdeadline" class="text-danger"></div>
                            </div>
                            <div class="select-wrapper col-md-12">
                                <label for="company">Employee:</label>
                                <select name="employee_id" id="employee_id">
                                    <option value="">Select a employee</option>
                                    @foreach ($employies as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->fname }}</option>
                                    @endforeach
                                </select>
                                <div id="empid" class="text-danger"></div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary my-3">save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>







    <!-- <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="footer">Close</button>
                </div>
            </div>
        </div>
    </div> -->
</div>
<div class="container">
    <a href="#" class="btn btn-primary mx-3 " data-toggle="modal" data-target="#myModal2">create project</a>
    <div id="edit-company-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="container my-3 mx-5">
                    <form id="companyForm">
                        <h5 class="text-center">Edit Project</h5>
                        <div class="row g-gs">
                            <div class="col-md-10">
                                <div id="name-error" class="text-danger"></div>
                                <div class="form-group">
                                    <label class="form-label" for="name">Name:</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="fname" placeholder="Name" name="name" value="">
                                    </div>
                                    <div class="form-control-wrap">
                                        <input type="hidden" class="form-control" id="id" placeholder="Name" name="id" value="">
                                    </div>
                                    <div id="fname-error"></div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div id="email-error" class="text-danger"></div>
                                <div class="form-group">
                                    <label class="form-label" for="detail">Detaill:</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="fdetail" placeholder="Project detail" name="detail" value="">
                                    </div>
                                    <div id="fdetail-error"></div>

                                </div>
                            </div>
                            <div class="col-md-10">
                                <div id="logo-error" class="text-danger"></div>
                                <div class="form-group">
                                    <label class="form-label" for="totalCost">Total Cost:</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="ftotalCost" placeholder="Total Cost" name="totalCost" value="">
                                    </div>
                                    <div id="ucast">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div id="logo-error" class="text-danger"></div>
                                <div class="form-group">
                                    <label class="form-label" for="deadline">Deadline:</label>
                                    <div class="form-control-wrap">
                                        <input type="date" class="form-control" id="fdeadline" placeholder="deadline" name="deadline" value="">
                                    </div>
                                </div>
                                <div id="udeadline">

                                </div>
                            </div>
                            <div class="select-wrapper col-md-10">
                                <label for="company">Company:</label>
                                <select name="employee_id" id="employeeid">

                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary my-3 save">save</button>
                    </form>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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


<div class="nk-content">
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="card card-preview">
                                <div class="card-inner">
                                    <div class="table-responsive">
                                        <table id="table" class="table">
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
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#companyForm1').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{url('projects')}}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#companyForm1')[0].reset();
                    window.location.href = "/projects";


                },
                error: function(response) {
                    if (response.responseJSON.errors) {
                        if (response.responseJSON.errors.name) {
                            $('#pname').html('<span class="text-danger">' + response.responseJSON.errors.name + '</span>');

                        } else {
                            $('#pname').html('');
                        }
                        if (response.responseJSON.errors.detail) {
                            $('#pdetail').html('<span class="text-danger">' + response.responseJSON.errors.detail + '</span>');

                        } else {
                            $('#pdetail').html('');
                        }
                        if (response.responseJSON.errors.totalCost) {
                            $('#ptotalCost').html('<span class="text-danger">' + response.responseJSON.errors.totalCost + '</span>');

                        } else {
                            $('#ptotalCost').html('');
                        }
                        if (response.responseJSON.errors.deadline) {
                            $('#pdeadline').html('<span class="text-danger">' + response.responseJSON.errors.deadline + '</span>');
                        } else {
                            $('#pdeadline').html('');
                        }
                    }

                }

            });



            function clear() {
                $('#pname').html('');
                $('#pdetail').html('');
                $('#ptotalCost').html('');
                $('#pdeadline').html('');
                $('#employee_id').val(''); // Reset the select field value
                $('#companyForm1')[0].reset(); // Reset the form fields
            }


            $('#footer').click(clear);
            $('#close').click(clear);


        });
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
                    Swal.fire(data.status);

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
                $('#fname').val(response.project.name)
                $('#fdetail').val(response.project.detail)
                $('#ftotalCost').val(response.project.totalCost)
                $('#fdeadline').val(response.project.deadline)
                var employeeSelect = $('#employeeid');
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


            },
            error: function(response) {
                if (response.responseJSON.errors) {
                    if (response.responseJSON.errors.name) {
                        $('#fname-error').html('<span class="text-danger">' + response.responseJSON.errors.name + '</span>');
                    } else {
                        $('#fname-error').html('')
                    }
                    if (response.responseJSON.errors.detail) {
                        $('#fdetail-error').html('<span class="text-danger">' + response.responseJSON.errors.detail + '</span>');
                    } else {
                        $('#fdetail-error').html('')
                    }
                    if (response.responseJSON.errors.totalCost) {
                        $('#ucast').html('<span class="text-danger">' + response.responseJSON.errors.totalCost + '</span>');
                    } else {
                        $('#ucast').html('')
                    }
                }
            }
        });
    });
</script>
@endsection