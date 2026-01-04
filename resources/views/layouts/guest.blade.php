<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', settings('site_title', 'Hello UNO')) - {{ settings('site_tagline', 'Public Service Portal') }}</title>
        <meta name="description" content="@yield('meta_description', settings('site_description', 'Login to access Hello UNO services.'))">
        <meta name="keywords" content="@yield('meta_keywords', settings('site_keywords', 'Login, Register, Hello UNO, Satkania'))">
        <meta name="author" content="{{ settings('site_author', 'Satkania Upazila Administration') }}">
        <meta name="robots" content="index, follow">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="@yield('title', settings('site_title', 'Hello UNO')) - {{ settings('site_tagline', 'Public Service Portal') }}">
        <meta property="og:description" content="@yield('meta_description', settings('site_description', 'Login to access Hello UNO services.'))">
        <meta property="og:image" content="@yield('meta_image', asset('images/logo.png'))">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ url()->current() }}">
        <meta property="twitter:title" content="@yield('title', settings('site_title', 'Hello UNO')) - {{ settings('site_tagline', 'Public Service Portal') }}">
        <meta property="twitter:description" content="@yield('meta_description', settings('site_description', 'Login to access Hello UNO services.'))">
        <meta property="twitter:image" content="@yield('meta_image', asset('images/logo.png'))">

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('favicon.ico') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full mt-6 px-6 py-4 bg-white shadow-md overflow-hidden">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
