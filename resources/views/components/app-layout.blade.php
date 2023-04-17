<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body class="antialiased">

    <body class="antialiased relative text-white" x-data="{ 'isModalOpen': false }"
        x-on:keydown.escape="isModalOpen=false">
        {{-- Flash Message Component --}}
        {{-- <x-flash-message /> --}}

        {{-- Navbar Component --}}
        {{-- <x-layout.navbar /> --}}

        {{-- Main wrapper --}}
        <div
            class="min-h-screen md:w-3/6 md:ml-[16.66%] md:mr-auto md:border-r-white md:border-r-2">
            {{-- Main section --}}
            {{ $slot }}
        </div>

        {{-- Import app.js --}}
        @vite('resources/js/app.js')
    </body>
</body>

</html>
