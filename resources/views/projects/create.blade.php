<div class="container my-3">
    <form id="companyForm">
        <h5 class="text-center">Add Project</h5>
        <div class="row g-gs">
            <div class="col-md-10">

                <div class="form-group">
                    <label class="form-label" for="name">Name:</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" class="@error('name') is-invalid @enderror">
                    </div>
                    <div id="name-error" class="text-danger"></div>
                </div>
            </div>
            <div class="col-md-10">
                <div id="email-error" class="text-danger"></div>
                <div class="form-group">
                    <label class="form-label" for="detail">Detaill:</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="detail" placeholder="Project detail" name="detail">
                    </div>
                    <div id="detail-error" class="text-danger"></div>

                </div>
            </div>
            <div class="col-md-10">
                <div id="logo-error" class="text-danger"></div>
                <div class="form-group">
                    <label class="form-label" for="totalCost">Total Cost:</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="totalCost" placeholder="Total Cost" name="totalCost">
                    </div>
                </div>
                <div id="totalCost-error" class="text-danger"></div>

            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label class="form-label" for="deadline">Deadline:</label>
                    <div class="form-control-wrap">
                        <input type="date" class="form-control" id="deadline" placeholder="deadline" name="deadline">
                    </div>
                </div>
                <div id="deadline-error" class="text-danger"></div>


            </div>
            <div class="select-wrapper col-md-10">
                <label for="company">Employee:</label>
                <select name="employee_id" id="employee_id">
                    <option value="">Select a employees</option>
                    @foreach ($employies as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->fname }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success my-3">save</button>
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

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script>
    $(document).ready(function() {
        $('#companyForm').on('submit', function(e) {
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
                    $('#companyForm')[0].reset();
                    window.location.href = "/projects";


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