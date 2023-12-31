<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--
    <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="flex-col items-center justify-center max-w-md mx-auto">
        <h2 class="text-3xl font-bold text-center mb-2">Welcome to Spell Book
            App!</h2>
        <a href={{ route('spellbooks.index') }} class="font-bold text-center underline ">Spellbooks</a>
    </div>

    {{-- @section('sidebar')
    This is the master sidebar.
    @show --}}
    <div class="container p-6 mx-auto">
        @yield('content')
    </div>

</body>


</html>