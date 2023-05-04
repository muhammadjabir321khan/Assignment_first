@extends('dashboard')
@section('content')
@section('title','Add Company')
<div class="container my-5">
    <table class="table">
        <form action="{{route('companies.search')}}" method="get">
            
            <div class="col-md-10 mb-2">
                <div id="email-error" class="text-danger"></div>
                <div class="form-group">
                    <label class="form-label" for="email">search</label>
                    <div class="form-control-wrap">
                        <input type="search" class="form-control" id="search" placeholder="search by projects" name="search">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary"> save</button>
        </form>
        <thead>

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
@endsection