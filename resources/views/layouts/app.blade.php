<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Website')</title>

    <!-- CSS & JS -->
    @vite(['resources/css/app.css', 'resources/css/common.css', 'resources/css/navbar.css', 'resources/js/app.js'])
</head>
<body>

    <!-- Navbar -->
    @include('core.navbar')

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('core.footer')

</body>
</html>
