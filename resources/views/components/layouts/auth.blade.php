<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="bg-white font-sans leading-normal tracking-normal">

    <main>
        {{ $slot }}
    </main>

    @livewireScripts
</body>

</html>
