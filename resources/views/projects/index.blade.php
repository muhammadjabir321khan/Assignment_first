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
                <form id="companyForm1">
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
                                <div id="ptotalCost" class="text-danger"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="deadline">Deadline:</label>
                                <div class="form-control-wrap">
                                    <input type="date" class="form-control" id="deadline" placeholder="deadline" name="deadline">
                                </div>
                                <div id="pdeadline" class="text-danger"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="employee_id">Employee:</label>
                                <div class="form-control-wrap">
                                    <select name="employee_id" id="employee_id" class="form-control">
                                        <option value="">Select an employee</option>
                                        @foreach ($employies as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->fname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="empid" class="text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary my-3">Update</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="foot">Close</button>
            </div>
        </div>
    </div>
</div>




<style>
    .project-modal .modal-dialog {
        max-width: 500px;
        /* Set your desired width here */
    }
</style>




<a href="#" class="btn btn-primary my-2 " data-toggle="modal" data-target="#myModal2">Create Project</a>
<div id="edit-company-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Project</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="updatehead"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="companyForm" class="company-form">
                    <div class="row g-4">
                        <div class="col-lg-12">
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
                        <div class="col-lg-12">
                            <div id="email-error" class="text-danger"></div>
                            <div class="form-group">
                                <label class="form-label" for="detail">Detail:</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="fdetail" placeholder="Project detail" name="detail" value="">
                                </div>
                                <div id="fdetail-error"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div id="logo-error" class="text-danger"></div>
                            <div class="form-group">
                                <label class="form-label" for="totalCost">Total Cost:</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="ftotalCost" placeholder="Total Cost" name="totalCost" value="">
                                </div>
                                <div id="ucast" class="text-danger"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div id="logo-error" class="text-danger"></div>
                            <div class="form-group">
                                <label class="form-label" for="deadline">Deadline:</label>
                                <div class="form-control-wrap">
                                    <input type="date" class="form-control" id="fdeadline" placeholder="deadline" name="deadline" value="">
                                </div>
                                <div id="udeadline" class="text-danger"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="employee_id">Employee:</label>
                                <div class="form-control-wrap">

                                    <select name="employee_id" id="employeeid" class="form-control">
                                        <option value="">Empty</option>
                                    </select>
                                </div>
                                <div id="empid" class="text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary my-3 save">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="ufoot">Close</button>
            </div>
        </div>
    </div>
</div>



<div class="nk-block nk-block-lg">
    <div class="card card-preview">
        <div class="card-inner">
            <table id="project" class="datatable-init nowrap table" style="width: 100%;">

                <thead>
                    <tr style="justify-content: center;">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Detail</th>
                        <th>totalCast</th>
                        <th>deadLine</th>
                        <th class="d-none d-sm-table-cell">Employee</th>
                        <th class="d-none d-sm-table-cell">Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection


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
                error.html('<span class=" text-danger">' + errorMessage + '</span>');
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
                    $('#project').DataTable().ajax.reload();
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

            $('#myModal2').on('hidden.bs.modal', function() {
                clear();
            });


        });
        $('#project').DataTable({
            "responsive": true,
            "processing": false,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('projects.index') }}",
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
                    "data": "employee",
                    "className": "d-none d-sm-table-cell"
                },
                {
                    "data": "action",
                    "orderable": false,
                    "searchable": false,
                    "className": "d-none d-sm-table-cell"
                }
            ],
            "dom": '<"row d-flex justify-content-between align-items-center"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 text-right"f>><"row"<"col-sm-12"t>><"row d-flex justify-content-between align-items-center"<"col-sm-12 col-md-9"i><"col-sm-12 col-md-3"p>>',
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "scrollX": true, // Enable horizontal scrolling
            "drawCallback": function(settings) {
                $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');
                $('.pagination').css('padding-left', '41px');
            }
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

    $(document).off('click', '.edit').on('click', '.edit', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '{{ url("projects","")}}' + '/' + id + '/edit',
            method: 'GET',
            success: function(response) {
                console.log(response.employee);
                $('#edit-company-modal').modal('show');
                $('#id').val(response.project.id);
                $('#fname').val(response.project.name);
                $('#fdetail').val(response.project.detail);
                $('#ftotalCost').val(response.project.totalCost);
                $('#fdeadline').val(response.project.deadline);
                var employeeSelect = $('#employeeid');

                response.employee.forEach(function(employee) {
                    var optionExists = employeeSelect.find('option[value="' + employee.id + '"]').length > 0;
                    if (!optionExists) {
                        var option = $('<option>').attr('value', employee.id).text(employee.fname);
                        employeeSelect.append(option);
                    }
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
        if ($('#employeeid option:selected').length === 0) {
            formData.append('employee_id', ''); // Append an empty value for employee_id
        }
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
                $('#edit-company-modal').modal('hide');
                $('#project').DataTable().ajax.reload();

                setTimeout(function() {
                    toastr.success('Data submitted successfully.', 'Success', {
                        positionClass: 'toast-top-left',
                    });
                }, 500);


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