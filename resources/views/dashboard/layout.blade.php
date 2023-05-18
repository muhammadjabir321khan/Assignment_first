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
    <link href="{{ mix('css/theme.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @yield('style')

    <head>
    </head>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">

    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="modal1-loader" style="display: none;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div id="modal1-content"></div>
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
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/theme.js') }}"></script>
    @yield('scripts')
    <script>
        $('#myModal1').on('show.bs.modal', function(e) {
            var url = '/employees/create';
            var modalBody = $(this).find('.modal-body');
            var modalContent1 = modalBody.find('#modal1-content');
            var modalLoader1 = modalBody.find('#modal1-loader');
            modalContent1.hide();
            modalLoader1.show();
            modalBody.load(url, function() {
                modalLoader1.hide();
                modalContent1.show();
            });


        });
    </script>
</body>



</html>