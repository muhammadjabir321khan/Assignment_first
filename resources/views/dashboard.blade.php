<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <head>
    </head>
    <!-- <link rel="stylesheet" href="{{asset('assets/css/dashlite.css?ver=2.9.1')}}"> -->
    @vite('resources/assets/css/dashlite.css')
    <!-- @vite('resources/assets/js/bundle.js')
    @vite('resources/assets/js/scripts.js') -->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>




    <!-- Employee modal -->
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- project modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="nk-app-root">
        <div class="nk-main ">
            @include('dashboard.sidebar')
            <div class="nk-wrap ">
                @include('dashboard.header')
                <div class="nk-content ">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
                @include('dashboard.footer')
            </div>
        </div>
    </div>


    <script src="{{asset('assets/js/bundle.js?ver=2.9.1')}}"></script>
    <script src="{{ asset('assets/js/scripts.js?ver=2.9.1 ')}}"></script>
    <script>
        $('#myModal').on('show.bs.modal', function(e) {
            var url = '/companies/create'; // URL for your create page
            var modalBody = $(this).find('.modal-body');
            modalBody.load(url);
        });
        $('#myModal1').on('show.bs.modal', function(e) {
            var url = '/employees/create';
            var modalBody = $(this).find('.modal-body');
            modalBody.load(url);
        });

        $('#myModal2').on('show.bs.modal', function(e) {
            var url = '/projects/create';
            var modalBody = $(this).find('.modal-body');
            modalBody.load(url);
        });
    </script>


</body>



</html>