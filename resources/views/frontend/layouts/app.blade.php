<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Niranta Palm Sugar - Since 2012' }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-32x32.png') }}">
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
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Additional Head Content -->
    @stack('head')
    
    <style>
        .brand-brown-dark { background-color: #482500; }
        .brand-gray { background-color: #D9D9D9; }
        .brand-beige { background-color: #E3D1BB; }
        .brand-cream { background-color: #F2ECE0; }
        .brand-orange { background-color: #B1410A; }
        
        .text-brand-brown-dark { color: #482500; }
        .text-brand-gray { color: #D9D9D9; }
        .text-brand-beige { color: #E3D1BB; }
        .text-brand-cream { color: #F2ECE0; }
        .text-brand-orange { color: #B1410A; }
        
        .font-inter { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="font-inter antialiased bg-white">
    <div class="min-h-screen">
        <!-- Navigation -->
        @if(!request()->routeIs('recipe.detail'))
            @include('frontend.partials.navbar')
        @endif

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        @include('frontend.partials.footer')
    </div>

    <!-- Additional Scripts -->
    @stack('scripts')
</body>
</html>
