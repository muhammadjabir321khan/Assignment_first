@extends('dashboard')
@section('content')
<div class="container" >
<a href="{{route('projects.create')}}" class="btn btn-primary mb-4" s>create project</a>
    <table id="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Detail</th>
                <th>totalCast</th>
                <th>deadLine</th>
                <th>Employee</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>


@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            "processing": false,
            "serverSide": true,
            "ajax": {
                "url": "{{route('projects.index')}}",
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
                    "data": "detail"
                },
                {
                    "data": "totalCost"
                },
                {
                    "data": "deadline"
                },
                {
                    "data": "employee"
                },
             
                {
                    "data": "action",
                    "orderable": false,
                    "searchable": false
                }


            ]
        });

        $(document).on('click', '.delete', function() {
            var table = $(this).data('table');
            var url = $(this).data('url');
            var method = $(this).data('method');

            $.ajax({
                url: url,
                type: method,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $('#' + table).DataTable().ajax.reload();
                    swal.fire(data.status);
                },
                error: function(xhr, status, error) {}
            });

        });
    });
</script>