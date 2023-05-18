<div class="nk-block nk-block-lg ">
    <form id="employee-form">
        <div>
            <div class="col-md-10">

                <div class="form-group">
                    <label class="form-label" for="fname"> First Name</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname">
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
                        <input type="text" class="form-control" id="lname" placeholder="last Name" name="lname">
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
            <div id="cname"></div>
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
                    $('#employee-form')[0].reset();
                    window.location.href = "/employees";

                },
                error: function(response) {
                    $('#fname-error').html('<span class="text-danger">' + response.responseJSON.errors.fname + '</span>')
                    $('#lname-error').html('<span class="text-danger">' + response.responseJSON.errors.lname + '</span>')
                    $('#cname').html('<span class="text-danger">' + response.responseJSON.errors.company_id + '</span>')
                }
            });
        });


    });
</script>