@extends('dashboard')
@section('content')
@section('title','Add-Employee')

<form id="employee-form">
    <div>
        <label for="fname">First Name:</label>
        <input type="text" name="fname" id="fname">
    </div>
    <div>
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" id="lname">
    </div>
    <div>
        <label for="company">Company:</label>
        <select name="company_id" id="company_id">
            <option value="">Select a company</option>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit">Save Employee</button>
</form>


@endsection

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
        $(document).ready(function () {
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
            
            success: function(response) {
                console.log(response);
                // Do something with the response (if needed)
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus + ': ' + errorThrown);
            }
        });
    });
});

</script>

                         