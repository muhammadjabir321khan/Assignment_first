<div class="nk-block nk-block-lg ">
    <form id="employee-form">
        <div>
            <div class="col-md-10">

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
                        <input type="text" class="form-control" id="fname" placeholder="First Name" name="lname">
                    </div>
                    <div id="lname-error" class="text-danger"></div>
                </div>
            </div>
        </div>
        <div class="select-wrapper col-md-10">
            <label for="company">Company:</label>
            <select name="company_id" id="company_id">
                <option value="">Select a company</option>
                @foreach ($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary my-3" style="margin-left: 13px;">Save Employee</button>
    </form>

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
<script>
    $(document).ready(function() {
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
                        toastr.success('Data added successfully!', 'Success', {
                            positionClass: 'toast-top-left'
                        });
                    }, 1000);
                    $('#employee-form')[0].reset();
                    window.location.href = "/employees";

                },
                error: function(xhr, status, error) {
                    var response = xhr.responseJSON;
                    if (response && response.errors) {
                        $.each(response.errors, function(key, value) {
                            $('#' + key + '-error')
                            $('#' + key + '-error').text(value[0]);
                        });
                    } else {
                        console.log(error);
                    }
                }
            });
        });
    });
</script>