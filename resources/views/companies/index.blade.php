@extends('dashboard')
@section('content')
<a href=" {{route('companies.create')}}" data-toggle="modal" data-target="#myModal" class="btn btn-primary mb-4">Create Company</a>
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
    });
</script>