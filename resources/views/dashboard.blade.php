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
<<<<<<< HEAD
    <title>@yield('title')</title>
    <head>
=======

    <!-- Page Title  -->
    <title>Dashboard | CRM | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
>>>>>>> cc91a8241a7876dbf5431c6817aca3859e24bef5
</head>

    <link rel="stylesheet" href="{{asset('assets/css/dashlite.css?ver=2.9.1')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('/assets/css/theme.css?ver=2.9.1 ')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<<<<<<< HEAD
   
=======
    
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-WXxlzk/fV7sQjKwJzfcxuAqCgBdS2YlWmFHZtZBqf4pud4E4IQDwB8jzG/fUGNnOtZfeJieLjKn8nI69Nbr5LA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
>>>>>>> cc91a8241a7876dbf5431c6817aca3859e24bef5

</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
<<<<<<< HEAD
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
=======
    <div class="nk-app-root">
        <div class="nk-main ">
            @include('dashboard.sidebar')
        </div>
        <div class="nk-wrap ">
            @include('dashboard.header')
            @yield('content')
        </div>
        @include('dashboard.footer')
    </div>
    </div>

>>>>>>> cc91a8241a7876dbf5431c6817aca3859e24bef5
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