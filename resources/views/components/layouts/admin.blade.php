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


<nav class="bg-white border-gray-200 py-8 dark:bg-gray-900">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
        <a href='{{ route("admin.dashboard")}}' class="flex items-center">
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Admin Panel</span>
        </a>
        <div class="flex items-center lg:order-2">
            <div class="hidden mt-2 mr-4 sm:inline-block">
                <span>Product</span>
            </div>
        </div>
        <div class="items-center justify-between w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">

            </ul>
        </div>
    </div>
</nav>


    <main>
        {{ $slot }}
    </main>

    @livewireScripts
</body>

</html>
