<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        @include('parts.styles')

        <!-- Scripts -->
        @routes
    </head>
    <body class="font-sans antialiased">
        @inertia
        @include('parts.scripts')
    </body>
</html>
