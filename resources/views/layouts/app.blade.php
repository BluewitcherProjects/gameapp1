<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-primary-dark bg-hero-gradient selection:bg-accent-gold selection:text-primary-dark">
        {{-- @include('layouts.navigation') --}}

        <!-- Page Heading -->
        {{-- @if (isset($header))
        <header class="bg-primary-midnight/50 backdrop-blur-md shadow-lg border-b border-white/5">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="text-accent-gold font-bold text-xl">
                    {{ $header }}
                </div>
            </div>
        </header>
        @endif --}}

        <!-- Page Content -->
        <main class="flex-grow pb-20">
            {{ $slot }}
        </main>

        {{-- @include('layouts.footer') --}}
        @include('layouts.mobile-nav')
    </div>
</body>

</html>