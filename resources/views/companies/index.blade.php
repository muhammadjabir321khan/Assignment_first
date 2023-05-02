@extends('dashboard')
<<<<<<< HEAD
@section('content')
<div class="container" style="margin-top: 100px;">

    <table id="companies-table">
        <a href="{{url('/companies/create')}}" class="btn btn-primary mb-4" s>create company</a>
=======

@section('content')

<div class="container " style="margin-top: 100px;">

    <table id="companies-table">
>>>>>>> cc91a8241a7876dbf5431c6817aca3859e24bef5
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Logo</th>
<<<<<<< HEAD
                <th>actions</th>
=======

>>>>>>> cc91a8241a7876dbf5431c6817aca3859e24bef5
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<<<<<<< HEAD

@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">


<script>
    $(document).ready(function() {
        $('#companies-table').DataTable({
            "processing": false,
            "serverSide": true,
            "ajax": {
                "url": "{{url('companies/all') }}",
                "type": "POST",
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
                }
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
=======
@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function() {
    $('#companies-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "{{url('companies/all') }}",
            "type": "POST",
            "dataType": "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        },
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "email" },
            {
                "data": "logo",
                "render": function (data, type, row) {
    return '<img src="./images/' + data + '" width="50" height="50" />';
}

            }
        ]
    });
>>>>>>> cc91a8241a7876dbf5431c6817aca3859e24bef5
});

</script>