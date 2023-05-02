@extends('dashboard')
@section('content')
<div class="container" style="margin-top: 100px;">

    <table id="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>FName</th>
                <th>lname</th>
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
<script>
      $(document).ready(function() {
        $('#table').DataTable({
            "processing": false,
            "serverSide": true,
            "ajax": {
                "url": "{{url('employee/all') }}",
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
                    "data": "fname"
                },
                {
                    "data": "lname"
                },
                {
                    "data": "action",
                    "orderable": false,
                    "searchable": false
                }
                
                
            ]
        });

    });

    
</script>