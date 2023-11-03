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
        <!-- Barra de Navegación -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- ... otros elementos de la navbar ... -->

            <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register.patient'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register.patient') }}">{{ __('Register') }}</a>
                    </li>
                @endif
                @else
                <!-- ... código para usuario autenticado ... -->
                @endguest
            </ul>
        </nav>

        <!-- Sidebar -->
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

