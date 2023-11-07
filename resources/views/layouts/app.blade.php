<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="scrollbar-thumb-gray-700 scrollbar-track-gray-300 dark:scrollbar-thumb-gray-900 dark:scrollbar-track-gray-500">

<head>
    {{-- @notifyCss --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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

<body class="font-sans antialiased scrollbar-thin">
    {{-- @include('notify::components.notify') --}}
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('templates/sidebar-menu')

        <main class="sm:ml-64">
            <div class="p-4">

                <div class="p-4 mt-14">
                    <div>
                        <nav class="flex mb-6" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                <li class="inline-flex items-center">
                                    <a href="{{ route('dashboard') }}"
                                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                        <svg class="w-3 h-3 mr-2.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                        </svg>
                                        Inicio
                                    </a>
                                </li>
                                @section('breadcrumbs')
                                @show
                            </ol>
                        </nav>
                    </div>

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
