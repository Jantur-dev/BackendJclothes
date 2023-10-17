<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JCLothes || Make Your Ideas Into Reality</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Font style -->
    <style>
        /*=============== GOOGLE FONTS ===============*/
        /* @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap");

        html {
            font-family: 'Roboto', sans-serif;
        } */
    </style>

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="assets/img/favicon/favicon.ico" type="image/x-icon">

    <!--=============== BO  1XICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body class="antialiased">
    @yield('content')

    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <script src="assets/js/star.js"></script>

    @include('sweetalert::alert')
</body>

</html>
