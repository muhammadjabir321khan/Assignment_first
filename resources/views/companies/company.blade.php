@extends('dashboard.layout')
@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    <div class="nk-block nk-block-lg">
                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="table-responsive">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="companySelect">Select Company:</label>
                                                    <select id="companySelect" class="form-control">
                                                        <option value="">Select Company</option>
                                                        @foreach ($companies as $company)
                                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="" method="get">
                                                    <div class="form-group">
                                                        <label class="form-label" for="search">Search:</label>
                                                        <div class="input-group">
                                                            <input type="search" class="form-control" id="search" name="search" placeholder="search">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>


                                        <table class="table my-5">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <tbody id="employeeList">
                                                <!-- @foreach($companies as $key => $company)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$company->name}}</td>
                                                    <td>{{$company->email}}</td>
                                                </tr>
                                                @endforeach -->
                                            </tbody>
                                        </table>
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
    .table-responsive {
        overflow-x: auto;
    }
</style>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        function fetchData(value) {
            $.ajax({
                url: "{{URL::to('company-search')}}",
                method: 'get',
                data: {
                    'search': value
                },
                success: function(data) {
                    console.log("data", data);
                    var companyHtml = '';
                    data.company.forEach(function(company) {
                        console.log(company)
                        companyHtml += '<tr>';
                        companyHtml += '<td>' + company.id + '</td>';
                        companyHtml += '<td> ' + company.name + '</td>';
                        companyHtml += '<td> ' + company.email + '</td>';
                        companyHtml += '</tr>';
                    });
                    $('#employeeList').html(companyHtml);
                }
            });
        }

        $('#search').on({
            keyup: function() {
                var value = $(this).val();
                if (value.length > 3) {
                    fetchData(value);
                }
            },
            keydown: function() {
                var value = $(this).val();
                if (value.length < 3) {
                    fetchData();
                }
            }
        });

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