<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Statamic Authentication Portal' }}</title>
    @vite('resources/css/site.css')
</head>

<body class="h-full">
    {{ $slot }}
    <livewire:footer />
    @vite('resources/js/site.js')
</body>

</html>
