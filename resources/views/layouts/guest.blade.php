<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="scrollbar-thumb-gray-700 scrollbar-track-gray-300 dark:scrollbar-thumb-gray-900 dark:scrollbar-track-gray-500">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tooltips -->
    <link href="https://cdn.jsdelivr.net/npm/@zkreations/tooltips@4/tooltips.min.css" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="/build/assets/app-172a5e6b.js" rel="stylesheet" />
    <script src="/build/assets/app-172a5e6b.js"></script>


    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <script src="
                https://cdn.jsdelivr.net/npm/notyf@3.10.0/notyf.min.js
                "></script>
    <link href="
https://cdn.jsdelivr.net/npm/notyf@3.10.0/notyf.min.css
" rel="stylesheet">

    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
        {{ $slot }}
    </div>

    @livewireScripts

    @stack('scripts')
    @yield('scripts')
</body>

</html>
