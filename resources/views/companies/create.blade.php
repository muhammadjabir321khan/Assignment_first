<div class="container my-5">
    <div class="nk-block nk-block-lg mb-5">
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="card-head">
                    <h5 class="card-title">Add Company</h5>
                </div>
                <form id="companyForm">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="full-name-1"> Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="full-name-1" name="name">
                                </div>
                                <div id="name-error" class="text-danger"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="email-address-1">Email address</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="email-address-1" name="email">
                                </div>
                                <div id="email-error" class="text-danger"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
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
            </div>
        </div>
    </div>
</div>
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
    });
</script>