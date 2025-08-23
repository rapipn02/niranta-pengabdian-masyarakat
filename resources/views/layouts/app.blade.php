<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.png') }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon.png') }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon.png') }}">
        <meta name="msapplication-TileImage" content="{{ asset('favicon.png') }}">
        <meta name="msapplication-TileColor" content="#ffffff">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
