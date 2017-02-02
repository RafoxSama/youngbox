<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimal-ui">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app" class="app">
        @include('partials.header')
        <div class="grid main">
            <div class="container">
                @include('partials.flash')
                @yield('content')
            </div>
        </div>
        @include('partials.sidebar')
    </div>
    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
