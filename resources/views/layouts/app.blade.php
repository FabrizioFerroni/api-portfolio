<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="scrollbar-thumb-gray-700 scrollbar-track-gray-300 dark:scrollbar-thumb-gray-900 dark:scrollbar-track-gray-500">

<head>
    {{-- @notifyCss --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
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

<body class="font-sans antialiased scrollbar-thin">
    {{-- @include('notify::components.notify') --}}
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('templates/sidebar-menu')

        <main class="sm:ml-64">
            <div class="p-4">

                <div class="p-4 mt-14">
                    {{ $slot }}
                </div>
            </div>
            {{-- @include('template/footer') --}}
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    @stack('scripts')
    @yield('scripts')

    <script>
        const notyf = new Notyf({
            duration: 3000,
            position: {
                x: "right",
                y: "top",
            },
        });
    </script>
    @if (Session::has('msgSuccess'))
        <script>
            let msgSuccess = "{{ Session::get('msgSuccess') }}";
            notyf.success(msgSuccess);
        </script>
    @endif
    @if (Session::has('msgError'))
        <script>
            let msgError = "{{ Session::get('msgError') }}";
            notyf.error(msgError);
        </script>
    @endif
    {{-- <x-notify::notify />
    @notifyJs --}}
</body>

</html>
