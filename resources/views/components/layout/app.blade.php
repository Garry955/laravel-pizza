<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Pizza</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=open-sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i"
        rel="stylesheet" />
</head>

<body class="antialiased">

    <body class="antialiased relative text-white" x-data="{ 'isModalOpen': false }" x-on:keydown.escape="isModalOpen=false">
        {{-- Flash Message Component --}}
        {{-- <x-flash-message /> --}}

        {{-- Navbar Component --}}
        <x-layout.navbar />

        {{-- Main wrapper --}}
        <div class="min-h-screen">
            {{-- Main section --}}
            {{ $slot }}
        </div>

        {{-- Import app.js --}}
        @vite('resources/js/app.js')
    </body>
</body>

</html>
