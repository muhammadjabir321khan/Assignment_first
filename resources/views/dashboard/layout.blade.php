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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    @yield('style')

    <head>
        <style>
            div.dataTables_wrapper div.dataTables_length select {
                margin: 10px;

            }

            .dataTables_filter {
                float: right;
            }

            div.dataTables_wrapper div.dataTables_filter input {
                width: 190px;
            }
        </style>
    </head>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">

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


</body>



</html>