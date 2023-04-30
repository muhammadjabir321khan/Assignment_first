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

    <link rel="stylesheet" href="{{asset('assets/css/dashlite.css?ver=2.9.1')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('/assets/css/theme.css?ver=2.9.1 ')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    

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
    <script src="{{asset('assets/js/bundle.js?ver=2.9.1')}}"></script>
    <script src="{{ asset('assets/js/scripts.js?ver=2.9.1 ')}}"></script>
    <script src="{{asset('assets/js/charts/chart-crm.js?ver=2.9.1 ')}}"></script>



</body>

<!-- <script>
    $('#allcompanies').click(function() {
        console.log("click");
        $('#page-container').load('/companies');
    });

    $('#add').click(function() {
        $('#page-container').load('companies/create');

    });
</script> -->





</html>