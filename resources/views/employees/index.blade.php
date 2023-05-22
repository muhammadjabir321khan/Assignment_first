@extends('dashboard.layout')
@section('content')


<!-- <div class="nk-block nk-block-lg "> -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="employee-form">
                    <div class="row g-4">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="fname"> First Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname">
                                </div>
                                <div id="fname-error" class="text-danger"></div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="fname"> Last Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="lname" placeholder="last Name" name="lname">
                                </div>
                                <div id="lname-error" class="text-danger"></div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="company_id">Company:</label>
                                <div class="form-control-wrap">
                                    <select class="form-control" name="company_id" id="company_id">
                                        <option value="">Select Company</option>
                                        @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach

                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <div id="companyname" class="text-danger"></div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary my-3" style="margin-left: 13px;">Save</button>
                    </div>
                </form>
                <div id="modal1-loader" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <div id="modal1-content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="footer">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->
<!-- <style>
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
</style> -->


<div class="modal fade" id="edit-employee-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Update Employee </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="employee-form">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label class="form-label" for="fname"> First Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="ufname" placeholder="Fisrt Name" name="fname">
                                </div>
                                <div id="fname-error" class="text-danger"></div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="fname"> Last Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="ulname" placeholder="last Name" name="lname">
                                </div>
                                <div id="lname-error" class="text-danger"></div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="company_id">Company:</label>
                                <div class="form-control-wrap">
                                    <select class="form-control" name="company_id" id="companyid">



                                    </select>
                                </div>
                                <div id="companyname" class="text-danger"></div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary my-3 save" style="margin-left: 10px;">Update</button>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="footer">Close</button>
            </div>
        </div>
    </div>

</div>












<a href="{{ route('employees.create') }}" data-toggle="modal" data-target="#myModal1" class="btn btn-primary my-3">Create Employee</a>
<div class="card card-preview">
    <div class="card-inner">
        <table id="employee-table" class="datatable-init nowrap table" style="width: 100%;">

            <thead>
                <tr style="justify-content: center;">
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





@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        function clearForm() {
            $('#employee-form')[0].reset();
            $('#fname-error').html('');
            $('#lname-error').html('');
            $('#companyname').html('');
        }

        $('#fname').on('input', function() {
            validateFirstName($(this).val());
        });

        $('#lname').on('input', function() {
            validateLastName($(this).val());
        });

        $('#company_id').on('input', function() {
            validateCompanyId($(this).val());
        });

        function validateFirstName(firstName) {
            if (firstName.trim() === '') {
                $('#fname-error').html('<span class="text-danger">The first name field is required</span>');
            } else {
                $('#fname-error').html('');
            }
        }

        function validateLastName(lastName) {
            if (lastName.trim() === '') {
                $('#lname-error').html('<span class="text-danger">The last name field is required</span>');
            } else {
                $('#lname-error').html('');
            }
        }

        function validateCompanyId(companyId) {
            if (companyId.trim() === '') {
                $('#companyname').html('<span class="text-danger">The company name field is required</span>');
            } else {
                $('#companyname').html('');
            }
        }

        // Submit form
        $('#employee-form').on('submit', function(e) {
            e.preventDefault();

            var formData = {
                fname: $('#fname').val(),
                lname: $('#lname').val(),
                company_id: $('#company_id').val()
            };

            $.ajax({
                url: '{{ route("employees.store") }}',
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {


                    setTimeout(function() {
                        $('#myModal1').modal('hide');
                        $('#employee-table').DataTable().ajax.reload();
                        toastr.success('Data submitted successfully.', 'Success', {
                            positionClass: 'toast-top-left',
                        });
                    }, 500);

                    clearForm();
                },
                error: function(response) {
                    var company_id = response.responseJSON.errors.company_id;
                    if (response.responseJSON.errors) {
                        if (response.responseJSON.errors.fname) {
                            $('#fname-error').html('<span class="text-danger">' + response.responseJSON.errors.fname + '</span>');
                        } else {
                            $('#fname-error').html('');
                        }
                        if (response.responseJSON.errors.lname) {
                            $('#lname-error').html('<span class="text-danger">' + response.responseJSON.errors.lname + '</span>');
                        } else {
                            $('#lname-error').html('');
                        }
                        if (company_id) {
                            $('#companyname').html('<span class="text-danger">' + company_id + '</span>');
                        } else {
                            $('#companyname').html('');
                        }
                    }
                }
            });
        });

        function clear() {
            $('#fname-error').html('');
            $('#lname-error').html('');
            $('#companyname').html('');
            $('#employee-form')[0].reset();

        }


        $('#myModal1').on('hidden.bs.modal', function() {

            clear();
        });





        $('#employee-table').DataTable({
            "processing": false,
            "serverSide": true,
            "responsive": true,
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


            ],
            "dom": '<"row d-flex justify-content-between align-items-center"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 text-right"f>><"row"<"col-sm-12"t>><"row d-flex justify-content-between align-items-center"<"col-sm-12 col-md-9"i><"col-sm-12 col-md-3"p>>',
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            // "drawCallback": function(settings) {
            //     $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search').css('margin-right', '34px');
            // },


        });

        $(document).on('click', '.delete-record', function() {
            var table = $(this).data('table');
            var url = $(this).data('url');
            var method = $(this).data('method');

            // Show a confirmation dialog to the user
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this data!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then(function(result) {
                if (result.isConfirmed) {
                    // User confirmed the deletion
                    $.ajax({
                        url: url,
                        type: method,
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            Swal.fire({
                                title: 'Deleted!',
                                text: data.success,
                                icon: 'success',
                                timer: 3000
                            });
                            $('#' + table).DataTable().ajax.reload();
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'An error occurred while deleting the data.',
                                icon: 'error',
                                timer: 3000
                            });
                            console.log(xhr.responseText);
                        }
                    });
                } else {
                    // User canceled the deletion
                    Swal.fire({
                        title: 'Cancelled',
                        text: 'Data deletion has been cancelled.',
                        icon: 'info',
                        timer: 3000
                    });
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
                $('#ufname').val(response.employee.fname)
                $('#ulname').val(response.employee.lname)
                var companySelect = $('#companyid');
                response.comapnies
                    .forEach(function(company) {
                        var option = $('<option>').attr('value', company.id).text(company.name);
                        companySelect.append(option);
                    });

            },


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
                $('#employee-table').DataTable().ajax.reload();
                setTimeout(function() {
                    toastr.success('Data Updated successfully.', 'Success', {
                        positionClass: 'toast-top-left',
                    });
                    $('#edit-employee-modal').modal('hide');
                }, 500);
            },
            error: function(response) {
                if (response.responseJSON.errors) {
                    if (response.responseJSON.errors.fname) {
                        $('#fname-error').html('<span class="text-danger">' + response.responseJSON.errors.fname + '</span>');
                    }
                    if (response.responseJSON.errors.lname) {
                        $('#lname-error').html('<span class="text-danger">' + response.responseJSON.errors.lname + '</span>');
                    }
                    if (response.responseJSON.errors.company_id) {
                        $('#cname').html('<span class="text-danger">' + response.responseJSON.errors.company_id + '</span>');
                    }
                }
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
                    $('#employee-table')
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