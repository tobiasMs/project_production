<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> @yield('public-title')</title>
    <!-- Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Landing page template for creative dashboard">
    <meta name="keywords" content="Landing page template">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('asset_public/assets/logos/favicon.ico') }}" type="image/png" sizes="16x16">
    <!-- Bootstrap -->
    <link href="{{ asset('asset_public/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,700,600" rel="stylesheet" type="text/css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('asset_public/assets/css/animate.css') }}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('asset_public/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_public/assets/css/owl.theme.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('asset_public/assets/css/magnific-popup.css') }}">
    <!-- Full Page Animation -->
    {{-- <link rel="stylesheet" href="{{ asset('asset_public/assets/css/animsition.min.css') }}"> --}}
    <!-- Ionic Icons -->
    <link rel="stylesheet" href="{{ asset('asset_public/assets/css/ionicons.min.css') }}">
    <!-- Main Style css -->
    <link href="{{ asset('asset_public/assets/css/style.css') }}" rel="stylesheet" type="text/css" media="all">
    @yield('public-customstyle')
</head>

<body>

    <div class="wrapper animsition" data-animsition-in-class="fade-in" data-animsition-in-duration="1000" data-animsition-out-class="fade-out" data-animsition-out-duration="1000">
        @include('application.public.layouts.components.header')
        <div class="main" id="main">
            @yield('public-content')

        </div>
        <!-- Main Section -->
    </div>
    <!-- Wrapper-->

    @include('application.public.layouts.components.footer')
    <!-- Jquery and Js Plugins -->
    <script type="text/javascript" src="{{ asset('asset_public/assets/js/jquery-2.1.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset_public/assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset_public/assets/js/plugins.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset_public/assets/js/menu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset_public/assets/js/custom.js') }}"></script>
    @yield('public-customscript')
</body>

</html>
