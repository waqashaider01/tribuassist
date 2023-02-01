<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TribuAssist') }}</title>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @stack('styles')
    @livewireStyles
</head>

<body>
    <main class="h-screen w-full overflow-y-auto flex flex-col justify-between bg-slate-100">
        @yield('content')
    </main>

    @stack('modals')
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

    @stack('scripts')
    @livewireScripts
</body>

</html>