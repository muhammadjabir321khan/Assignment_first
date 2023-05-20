@extends('dashboard.layout')
@section('content')


<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Project</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="head"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="companyForm1" class="mx-5">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="name">Name:</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" class="@error('name') is-invalid @enderror">
                                </div>
                                <div id="pname"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="detail">Detail:</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="detail" placeholder="Project detail" name="detail">
                                </div>
                                <div id="pdetail"></div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div id="logo-error" class="text-danger"></div>
                            <div class="form-group">
                                <label class="form-label" for="totalCost">Total Cost:</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="totalCost" placeholder="Total Cost" name="totalCost">
                                </div>
                            </div>
                            <div id="ptotalCost" class="text-danger"></div>

                        </div>
                        <div class="col-lg-12">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="foot">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>





<a href="#" class="btn btn-primary my-2 " data-toggle="modal" data-target="#myModal2">create project</a>
<div id="edit-company-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Project</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="updatehead"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="container my-3 mx-5">
                <form id="companyForm">
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
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="ufoot">Close</button>
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



<div class="nk-block nk-block-lg">
    <div class="card card-preview">
        <div class="card-inner">
            <table id="project" class="datatable-init-export nowrap table" data-export-title="Export">
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


@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@section('scripts')
<script>
    $(document).ready(function() {
        // Validation function
        // Attach event listeners
        $('#name').on('input', function() {
            validateField('name', 'pname', 'The name field is required');
        });

        $('#detail').on('input', function() {
            validateField('detail', 'pdetail', 'The detail field is required');
        });

        $('#totalCost').on('input', function() {
            validateField('totalCost', 'ptotalCost', 'The total cost field is required');
        });

        $('#deadline').on('input', function() {
            validateField('deadline', 'pdeadline', 'The deadline field is required');
        });



        // Form submission validation
        $('#companyForm1').on('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            // Validate fields before submission
            validateField('name', 'pname', 'The name field is required');
            validateField('detail', 'pdetail', 'The  detail field is required');
            validateField('totalCost', 'ptotalCost', 'The total cost field is required');
            validateField('deadline', 'pdeadline', 'The deadline field is required');

            // Proceed with form submission if all fields are valid
            if (isFormValid()) {
                this.submit();
            }
        });

        // Validation function
        function validateField(fieldId, errorId, errorMessage) {
            var field = $('#' + fieldId);
            var error = $('#' + errorId);
            var fieldValue = field.val().trim();

            if (fieldValue === '') {
                error.html('<span class="text-danger">' + errorMessage + '</span>');
            } else {
                error.html('');
            }
        }

        // Check if all fields are valid
        function isFormValid() {
            var errors = $('.text-danger');
            return errors.length === 0;
        }


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

                    setTimeout(function() {
                        $('#myModal2').modal('hide');
                    }, 500);
                    $('#company').DataTable().ajax.reload();
                    setTimeout(function() {
                        toastr.success('Data submitted successfully.', 'Success', {
                            positionClass: 'toast-top-left',
                        });
                    }, 500);
                    $('#companyForm1')[0].reset();



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


            $('#foot').click(clear);
            $('#head').click(clear);


        });
        $('#project').DataTable({



            "responsive": true,
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
                },



            ],


        });

        $(document).on('click', '.delete-project', function() {
            var table = $(this).data('table');
            var url = $(this).data('url');
            var method = $(this).data('method');
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this data!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed deletion, proceed with AJAX request
                    $.ajax({
                        url: url,
                        type: method,
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            // Display success message using SweetAlert2
                            Swal.fire({
                                title: 'Deleted!',
                                text: data.success,
                                icon: 'success',
                                timer: 3000
                            });
                            $('#project').DataTable().ajax.reload();
                        },
                        error: function(xhr, status, error) {
                            // Display error message using SweetAlert2
                            Swal.fire({
                                title: 'Error!',
                                text: 'An error occurred while deleting the data.',
                                icon: 'error',
                                timer: 3000
                            });
                            console.log(xhr.responseText);
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // User canceled deletion, show cancel message
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

    function updateFiled() {
        $('#fname-error').html('');
        $('#fdetail-error').html('');
        $('#ucast').html('');
        $('#udeadline').html('');
    }

    $('#ufoot').click(updateFiled);
    $('#updatehead').click(updateFiled);


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