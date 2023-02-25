<!DOCTYPE html>
{{-- <html lang="es"> --}}
<head>
    <title>Snack n Roll Diner</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel = "icon"  href="{{ asset('images/logo_trans1.jpg') }}"
    type = "image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    {{-- ///////////////////////////////////////////////////////////////////////////////////////// --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    {{-- ///////////////////////////////////////////////////////////////////////////////////////// --}}
    <link rel="stylesheet" href="{{ asset('main/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/animate.css') }}">
{{--
    <link rel="stylesheet" href="main/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="main/css/animate.css"> --}}
    <link href="{{ asset('admin/assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('main/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/magnific-popup.css') }}">

    {{-- <link rel="stylesheet" href="main/css/owl.carousel.min.css">
    <link rel="stylesheet" href="main/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="main/css/magnific-popup.css"> --}}

    <link rel="stylesheet" href="{{ asset('main/css/aos.css') }}">
    {{-- <link rel="stylesheet" href="main/css/aos.css"> --}}

    <link rel="stylesheet" href="{{ asset('main/css/ionicons.min.css') }}">
    {{-- <link rel="stylesheet" href="main/css/ionicons.min.css"> --}}

    <link rel="stylesheet" href="{{ asset('main/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/jquery.timepicker.css') }}">
    {{-- <link rel="stylesheet" href="main/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="main/css/jquery.timepicker.css"> --}}

    <link rel="stylesheet" href="{{ asset('main/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/icomoon.css') }}">
    {{-- <link rel="stylesheet" href="main/css/flaticon.css">
    <link rel="stylesheet" href="main/css/icomoon.css"> --}}
    <link rel="stylesheet" href="{{ asset('main/css/style.css') }}">

    {{-- <link rel="stylesheet" href="main/css/style.css"> --}}
</head>
<body>
    @include('main.layouts.nav-bar')

    {{-- carrusel --}}
    @yield('top')
    {{-- barrita de informacion --}}
    @include('main.layouts.intro')

    @yield('content')

    @include('main.layouts.footer')


</body>

</html>
