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
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900 bg-Azul01SC">
        <!-- Vídeo de fundo -->
        <video class="absolute top-0 left-0 z-0 object-cover w-full h-full opacity-10" autoplay loop muted>
            <source src="{{ asset('images/bgvideo.mp4') }}" type="video/mp4">
        </video>

        <div class="flex flex-col items-center min-h-screen pt-6 bg-Azul01SC sm:justify-center sm:pt-0 Z-10">
            <div>
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo do Cliente" class="block w-auto h-20" />
                </a>
            </div>

            <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
