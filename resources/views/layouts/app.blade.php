<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Aquí va la barra de navegación, sidebar, etc. -->
        @include('layouts.navbar')
        @include('layouts.sidebar')

        <!-- Contenido Principal -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Pie de página -->
        @include('layouts.footer')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
