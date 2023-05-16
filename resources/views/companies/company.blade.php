@extends('dashboard.layout')
@section('content')

<div class="container">

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="card card-preview">
                                <div class="card-inner">
                                    <div class="table-responsive">
                                        <form action="" method="get">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="phone-no-1">Search</label>
                                                    <div class="form-control-wrap">
                                                        <input type="search" class="form-control" id="search" name="search">
                                                    </div>
                                                    <a href="{{url('search-company')}}" class="btn btn-primary my-2">reset</a>
                                                </div>
                                            </div>
                                        </form>
                                        <table class="table my-3">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>

                                                </tr>
                                            </thead>
                                            <tbody id="content">
                                                @foreach($companies as $key => $company)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$company->name}}</td>
                                                    <td>{{$company->email}}</td>
                                                </tr>
                                                @endforeach
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
                    $('#content').html(companyHtml);
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
                    fetchData(); // 
                }
            }
        });
    });
</script>
@endsection