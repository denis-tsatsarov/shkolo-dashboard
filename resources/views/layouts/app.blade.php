<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Shkolo') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-dark navbar-expand-md">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Shkolo') }}</a>
                @include('partials.sidenav.toggler', ['btnClasses' => 'd-none d-md-block'])
                @include('partials.topnav')
            </div>
        </nav>
        <div class="page">
            @include('partials.sidenav.toggler', ['rowClasses' => 'd-md-none pb-3'])
            <div class="wrapper">
                @include('partials.sidenav.menu')
                <div id="content" class="container">
                    @yield('content')
                </div>
            </div>     
        </div>
    </div>
</body>
</html>
