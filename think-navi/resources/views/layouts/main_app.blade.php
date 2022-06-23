<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app" class="h-screen relative overflow-hidden">

        @yield('content')
    </div>
    <!-- <script src="../path/to/@themesberg/flowbite/dist/flowbite.bundle.js"></script> -->
    <script src="https://unpkg.com/flowbite@latest/dist/flowbite.js"></script>
    <script src="{{ mix('js/main_tools.js') }}"></script>
</body>

</html>