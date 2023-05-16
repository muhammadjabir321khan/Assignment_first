<!-- resources/views/employees/filter.blade.php -->
@extends('dashboard.layout')
@section('content')
<div>
    <div class="select-wrapper col-md-10">
        <label for="company">Company:</label>
        <select id="companySelect">
            @foreach ($companies as $company)
            <option value="">Select Company</option>
            <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    <div class="nk-block nk-block-lg">
                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>FirstName</th>
                                                <th>lastName</th>

                                            </tr>
                                        </thead>
                                        <tbody id="employeeList">

                                        </tbody>
                                    </table>
                                    <!-- Display the employee list here -->
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#companySelect').change(function() {
            var companyId = $(this).val();
            $.ajax({
                url: '/filter/' + companyId,
                type: 'GET',
                success: function(response) {
                    console.log('response', response);

                    var employeeHtml = '';
                    $.each(response.employee, function(index, employee) {
                        var key = index + 1;
                        employeeHtml += '<tr>';
                        employeeHtml += '<td>' + key + '</td>';
                        employeeHtml += '<td> ' + employee.lname + '</td>';
                        employeeHtml += '<td> ' + employee.fname + '</td>';
                        employeeHtml += '</tr>';

                    });
                    $('#employeeList').html(employeeHtml);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>


@endsection