@extends('dashboard.layout')
@section('content')
@role('admin')
<div class="modal fade" id="edit-employee-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Update Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="employee-form">
                    <div>
                        <div class="col-md-10">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label class="form-label" for="fname"> First Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname">
                                </div>
                                <div id="fname-error" class="text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="fname"> Last Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname">
                                </div>

                            </div>
                            <!-- <div id="lname-error" class="text-danger"></div> -->
                        </div>
                    </div>
                    <div class="select-wrapper col-md-10">
                        <label for="company">Company:</label>
                        <select name="company_id" id="companyid">
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary my-3 save" style="margin-left: 10px;">Update Employee</button>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
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



<div class="container">
    <a href="{{ route('employees.create') }}" data-toggle="modal" data-target="#myModal1" class="btn btn-primary mx-3">Create Employee</a>
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="card card-preview">
                                <div class="card-inner">
                                    <div class="table-responsive">
                                        <table id="companies-table" class="table">
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
<style>
    td.action-column {
        padding: 0px 0px;
    }
</style>
@endrole
@endsection

@section('scripts')
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
                    "searchable": false,
                    "className": "action-column"
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
                $('#edit-employee-modal').modal('show');
                $('#id').val(response.employee.id);
                $('#lname').val(response.employee.lname)
                $('#fname').val(response.employee.fname)
                var companySelect = $('#companyid');
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
@endsection