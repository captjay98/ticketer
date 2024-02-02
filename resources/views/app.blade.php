<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta nmae="description" content="A Train Ticket Booking Site for Nigerians, NRC, the Nigerian Railway Commision">
    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" media="print"
        onload="this.media='all'">
    <link rel="preload" as="image" href="/storage/home-images/train2.webp">

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body class="w-screen overflow-x-hidden bg-white font-sans antialiased">
    @inertia
</body>

</html>
