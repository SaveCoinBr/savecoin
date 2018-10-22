<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('vendor/fontawesome/js/all.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('vendor/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/jQueryApp.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome/css/all.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @component('component.menu')@endcomponent

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script>
        jQuery(document).ready(function () {
            APP_URL = "{{ env('APP_URL') }}";

        });
    </script>

@yield('scripts')
</body>
</html>
