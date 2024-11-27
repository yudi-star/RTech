<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Reborntech' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    </head>
    <body class="bg-slate-200 dark:bg-slate-700">
        @livewire('partials.Header')
        <main>
            {{ $slot }}
        </main>
        @livewire('partials.Footer')
        @livewireScripts

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />
    </body>
</html>
