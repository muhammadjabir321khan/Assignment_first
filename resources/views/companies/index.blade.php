@extends('dashboard')

@section('content')

<div class="container " style="margin-top: 100px;">

    <table id="companies-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Logo</th>

            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

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
});

</script>