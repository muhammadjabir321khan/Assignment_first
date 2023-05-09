@extends('dashboard')
@section('content')
<a href=" {{route('companies.create')}}" data-toggle="modal" data-target="#myModal" class="btn btn-primary mb-4">Create Company</a>
<div id="edit-company-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="container my-5">
                <div class="nk-block nk-block-lg mb-5">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="title nk-block-title">Edit Company Details</h4>
                            <div class="nk-block-des">
                            </div>
                        </div>
                    </div>
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="card-head">
                                <h5 class="card-title">Eid Company</h5>
                            </div>
                            <form id="companyForm">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1"> Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="full-name-1" name="name" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="email-address-1">Email address</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="email-address-1" name="email" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="phone-no-1">Image</label>
                                            <div class="form-control-wrap">
                                                <input type="file" class="form-control" id="phone-no-1" name="image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container">
    <div class="card card-preview">
        <div class="card-inner">
            <table id="table" class="datatable-init nowrap table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Logo</th>
                        <th scope="col">actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">


<script>
    $(document).ready(function() {
        $('#table').DataTable({
            "processing": false,
            "serverSide": true,
            "ajax": {
                "url": "{{route('companies.index') }}",
                "method": "GET",
                "dataType": "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "name"
                },
                {
                    "data": "email"
                },
                {
                    "data": "logo",
                    "render": function(data, type, row) {
                        return '<img src="/storage/images/' + data + '" width="50" height="50" />';
                    }
                },
                {
                    "data": "action",
                    "orderable": false,
                    "searchable": false
                },

            ]
        });

    });
    $(document).on('click', '.delete', function() {
        var table = $(this).data('table');
        var url = $(this).data('url');
        var method = $(this).data('method');
        if (confirm("Are you sure you want to delete this company?")) {
            $.ajax({
                url: url,
                type: method,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    alert(data.success);
                    $('#' + table).DataTable().ajax.reload();
                },
                error: function(xhr, status, error) {
                    $('.alert-success').text('Data successfully deleted!').fadeIn().delay(3000).fadeOut();

                    console.log(xhr.responseText);
                }
            });
        }

        $(document).on('show.bs.modal', '#edit-company-modal', function(event) {
            var button = $(event.relatedTarget);
            var companyId = button.data('id');

            var modal = $(this);
            $.ajax({
                url: "{{url('companies','') }}" + '/' + companyId + '/edit',
                type: 'GET',
                success: function(response) {
                    console.log(response.data.company)
                    // var company = response.data;
                    modal.find('#full-name-1').val(company.name);
                    modal.find('#email-address-1').val(company.email);
                    modal.find('#phone-no-1').val('');
                    modal.find('.modal-content form').attr('action', '/companies/' + company.id);
                }
            });
        });


    });
</script>