<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>App-Name - @yield('titile')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')

</head>

<body>
    <h1 class="text-3xl font-bold underline text-center">Welcome to Spell Book App!</h1>
    {{-- @section('sidebar')
    This is the master sidebar.
    @show --}}
    <div class="container mx-auto p-6">
        @yield('content')
    </div>

    @vite('resources/js/app.js')
</body>


</html>