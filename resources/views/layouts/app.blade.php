<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        @include('layouts.flash')
        {{-- <div class="flex">
            @include('layouts.sidebar')

            <!-- Page Content -->
            <main class="p-[1rem] w-[80vw]">
                {{ $slot }}
            </main>
        </div> --}}

        <!-- Page Content -->
        <div class="flex">
            @include('layouts.sidebar')
            <main class="p-[2rem] bg-gray-200 w-full">
                {{ $slot }}
            </main>
        </div>

    </div>
</body>

</html>
