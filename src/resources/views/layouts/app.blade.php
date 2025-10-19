<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Livewire2 PlayGround</title>

        <!-- Livewire Assets -->
        @livewireStyles
        @livewireScripts
    </head>
    <h1><a href="{{ route('index') }}">Livewire2 PlayGround</a></h1>
    <body>
        @yield('content')
    </body>
</html>
