@extends('dashboard')
@section('content')
@section('title','Search Company')
<div class="container my-5">
    <div class="form-group">
        <form action="{{ route('companies.search') }}" method="get">
            <div class="form-group">
                <label class="form-label" for="default-01">Search Company</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="default-01" placeholder="Enter email" name="email">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div class="card card-preview">
        <div class="card-inner">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead class="table">
                <tbody id="employeeList">
                    <!-- @foreach($companies as $key => $company)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                    </tr>
                    @endforeach -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-label {
        font-weight: bold;
    }

    .input-group {
        width: 100%;
    }

    .input-group-append {
        display: flex;
        align-items: center;
    }

    .table {
        margin-top: 1rem;
    }

    .card {
        border: 1px solid #ebedf2;
        border-radius: 4px;
    }

    .card-inner {
        padding: 1.25rem;
    }

    .table thead th {
        background-color: #f7f7f7;
        font-weight: bold;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: middle;
    }
</style>
@endsection
@section('scripts')
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