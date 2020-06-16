<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="{{ asset('./')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    @include('partials.includes')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/load.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/coreui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}"> <!--choosen-->
    <style>
        @media screen and (min-width: 767px) {
            .navbar-brand-full {
                display: block !important;
            }
            .navbar-brand-minimized {
                display: none !important;
            }
        }
        @media screen and (max-width: 768px) {
            .navbar-brand-full {
                display: none !important;
            }
            .navbar-brand-minimized {
                display: block !important;
            }
        }
    </style>

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('css/datatables.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">

    <!-- Icons -->
    <link href="{{ asset('css/simple-line-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.css" rel="stylesheet') }}">

    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
</head>
<script>
    $(document).ready(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
    });
</script>
@yield('general')
</html>
