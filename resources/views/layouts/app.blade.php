<!-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik {{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles-index.css') }}">
    <script src="{{ asset('js/scripts.js') }}" defer></script>
</head>
<body> -->
    <!-- Header -->
    <!-- @include('partials.header') -->

    <!-- Content -->
    <!-- <main>
        @yield('content')
    </main> -->

    <!-- Footer -->
    <!-- @include('partials.footer')

    
    <script src="{{ asset('js/script.js') }}" defer></script>
</body>
</html> -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Admin')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <main class="py-4">
        @yield('content')
    </main>
    <footer>
        <p>&copy; 2024 Klinik Majusejahtera. All Rights Reserved.</p>
    </footer>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html> 
