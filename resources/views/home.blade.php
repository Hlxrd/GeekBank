<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    @vite(['resources/js/app.js'])
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex justify-center gap-3">
        <button class="btn btn-primary"><a class="text-white no-underline" href="{{ route('login') }}">login</a></button>
        <button class="btn btn-primary"><a class="text-white no-underline"
                href="{{ route('register') }}">register</a></button>
    </div>
</body>

</html>
