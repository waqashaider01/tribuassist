<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TribuAssist') }}</title>
    <link rel="shortcut icon" href="{{asset('logo.png')}}" type="image/x-icon">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />

    <!-- Styles -->
    @stack('styles')
    @livewireStyles
</head>

<body>
    <article class="h-screen w-screen flex overflow-hidden">
        @livewire('admin.layout.sidebar')

        <main class="h-screen w-full overflow-y-auto flex flex-col justify-between bg-slate-100">
            @livewire('admin.layout.header')

            <div class="flex items-center gap-2 md:hidden py-3 px-6 bg-white border-b">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                </svg>
                <h1 class="text-xl font-light">@yield('page_name')</h1>
            </div>

            <div class="h-full overflow-auto">
                {{ $slot }}
            </div>
        </main>
    </article>

    @stack('modals')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>

    @stack('scripts')
    @livewireScripts
</body>

</html>