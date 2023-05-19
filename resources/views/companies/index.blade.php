@extends('dashboard.layout')
@section('content')
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Company</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="head"><span aria-hidden="true">&times;</span></button>
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
                                <div id="cname">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="email-address-1">Email address</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="email-address-1" name="email">
                                </div>
                                <div id="cemail">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="phone-no-1">Image</label>
                                <div class="form-control-wrap">
                                    <input type="file" class="form-control" id="phone-no-1" name="image">
                                </div>
                            </div>
                            <div id="cimage">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save Informations</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="foot">Close</button>
            </div>
        </div>
    </div>
</div>
<a href=" {{route('companies.create')}}" data-toggle="modal" data-target="#myModal" class="btn btn-primary mb-2 mx-1">Create Company</a>
<div id="edit-company-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Company</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="updateclose"><span aria-hidden="true">&times;</span></button>
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
                            <div id="upname"></div>
                        </div>
                        <div class=" col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="email-address-1">Email address</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="email" name="email" value="">
                                </div>
                                <div id="update"></div>
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

                            <div id="upimage"></div>
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
                <button type="button" class="btn btn-default" data-dismiss="modal" id="updatemodal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="nk-block nk-block-lg">
    <div class="card card-preview">
        <div class="card-inner">
            <table id="company" class="datatable-init nowrap table" style="width: 100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>Email</th>
                        <th>image</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>

            </table>
        </div>
    </div><!-- .card-preview -->
</div>
<!-- nk-block -->
<style>
    .myCustomButtonContainer {
        justify-content: flex-end;
        margin-top: 10px;
    }

    .myCustomButtonContainer button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;

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
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->
<script>
    $(document).ready(function() {

        function clearForm() {
            $('#companyForm')[0].reset();
            $('#cname').html('');
            $('#cemail').html('');
            $('#cimage').html('');
        }


        $('#full-name-1').on('input', function() {
            validateName($(this).val());
        });

        $('#email-address-1').on('input', function() {
            validateEmail($(this).val());
        });



        function validateName(name) {
            if (name.trim() === '') {
                $('#cname').html('<span class="text-danger">The name field is required</span>');
            } else {
                $('#cname').html('');
            }
        }



        function validateEmail(email) {
            if (email.trim() === '') {
                $('#cemail').html('<span class="text-danger">The email field is required</span>');
            } else {
                $('#cemail').html('');
            }
        }

        function validateImage(image) {
            if (image.trim() === '') {
                $('#cimage').html('<span class="text-danger">The image field is required</span>');
            } else {
                $('#cimage').html('');
            }
        }

        // Real-time validation for the image input
        $('#phone-no-1').on('input', function() {
            var imageValue = $(this).val();
            validateImage(imageValue);
        });

        // Submit form
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

                    clearForm();
                    setTimeout(function() {
                        $('#myModal').modal('hide');
                    }, 500);
                    $('#company').DataTable().ajax.reload();
                    setTimeout(function() {
                        toastr.success('Data submitted successfully.', 'Success', {
                            positionClass: 'toast-top-left',
                        });
                    }, 500);
                },
                error: function(response) {


                    // Display name error message
                    if (response.responseJSON.errors.name) {
                        var errorMessage = JSON.stringify(response.responseJSON.errors.name);
                        var formattedMessage = errorMessage.replace(/[\[\]"']+/g, '');
                        $('#cname').html('<span class="text-danger">' + formattedMessage + '</span>');
                    }

                    // Display email error message
                    if (response.responseJSON.errors.email) {
                        var emailErrorMessage = JSON.stringify(response.responseJSON.errors.email[0]);
                        var formattedEmailMessage = emailErrorMessage.replace(/[\[\]"']+/g, '');
                        $('#cemail').html('<span class="text-danger">' + formattedEmailMessage + '</span>');
                    }

                    // Display image error message
                    if (response.responseJSON.errors.image) {
                        var imageErrorMessage = JSON.stringify(response.responseJSON.errors.image[0]);
                        var formattedImageMessage = imageErrorMessage.replace(/[\[\]"']+/g, '');
                        $('#cimage').html('<span class="text-danger">' + formattedImageMessage + '</span>');
                    } else {
                        $('#cimage').html('');
                    }
                }
            });
        });

        function Errors() {
            $('#cname').html('');
            $('#cemail').html('');
            $('#cimage').html('');
            clearForm();
        }
        $('#head').click(Errors);
        $('#foot').click(Errors);




        $('#company').DataTable({
            "responsive": true,
            "processing": false,
            "serverSide": true,
            // "dom": '<"row"<"col-md-4"l><"col-md-3"<"myCustomButtonContainer">><"col-md-5"f>>t<"row"<"col-md-8"i><"col-md-4"p>>',
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
            // "initComplete": function(settings, json) {
            //     $('.myCustomButtonContainer').html('<button id="myCustomButton" >Click Me</button>');
            //     $('#myCustomButton').on('click', function() {
            //         alert('Button clicked!');
            //     });
            // }
        });
        // $('#company thead th:last-child').append('<button id="myButton">Click Me</button>');


    });
    $(document).on('click', '.delete-company', function() {
        var table = $(this).data('table');
        var url = $(this).data('url');
        var method = $(this).data('method');

        // Show confirmation message using SweetAlert2
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
                        $('#' + table).DataTable().ajax.reload();
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

    $(document).on('click', '.edit', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '{{ url("companies","")}}' + '/' + id + '/edit',
            method: 'Get',
            success: function(response) {
                $('#edit-company-modal').modal('show');
                $('#name').val(response.data.name)
                $('#id').val(response.data.id)
                $('#email').val(response.data.email)
                $('#company-image').attr('src', "/storage/images/" + response.data.logo);
            },
            error: function(response) {

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
            error: function(response) {
                if (response.responseJSON.errors && response.responseJSON.errors.email) {
                    $('#update').html('<span class="text-danger">' + response.responseJSON.errors.email[0] + '</span>');
                }
                console.log(response.responseJSON.errors);
                if (response.responseJSON.errors) {
                    if (response.responseJSON.errors.name) {
                        $('#upname').html('<span class="text-danger">' + response.responseJSON.errors.name[0] + '</span>');
                    }
                    if (response.responseJSON.errors.image && response.responseJSON.errors.image.length > 0) {
                        var errorMessage = '<span class="text-danger">' + response.responseJSON.errors.image[0] + '</span>';
                        $('#upimage').html(errorMessage);
                        $('.form-control-wrap').addClass('has-error');
                    }
                }
            }
        });


        function clearUpdateErrors() {
            $('#upname').html('');
            $('#update').html('');
            $('#upimage').html('');
        }
        $('#updatemodal').click(clearUpdateErrors);
        $('#updateclose').click(clearUpdateErrors);



    });
</script>
@endsection