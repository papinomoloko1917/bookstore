<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>


<body class="min-h-screen bg-gray-50 text-gray-900 flex flex-col">

    <header class="w-full max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <livewire:header.navbar />
    </header>

    <main class="flex-1 w-full max-w-screen-2xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>

    <footer class="w-full max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <livewire:footer />
    </footer>

    @livewireScripts
</body>

</html>
