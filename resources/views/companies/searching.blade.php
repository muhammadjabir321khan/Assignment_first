@extends('dashboard')
@section('content')
@section('title','Add Company')
<div class="container my-5">

    <div class="form-group ">
        <form action="{{route('companies.search')}}" method="get">
            <div class="form-group">
                <label class="form-label" for="default-01">Search Company</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control col-md-11" id="default-01" placeholder="Input placeholder" name="email">
                </div>
                <button type="submit" class="btn btn-primary mb-2 float-right" style="margin-top: -34px;"> save</button>
            </div>
        </form>
    </div>
    <div class="card card-preview">
        <div class="card-inner">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $key => $company)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$company->name}}</td>
                        <td>{{$company->email}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection