<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @yield('metas')

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{$setting->favicon}}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
    @livewireStyles

    <!-- Scripts -->
    {{-- <script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script> --}}
    <script defer src="/js/persist.js"></script>
    <!-- Alpine Core -->
    <script defer src="/js/alpine.js"></script>
    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    <script src="{{ url(mix('js/app.js')) }}" defer></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <script src="/assets/js/init-alpine.js"></script>
    <link rel="stylesheet" href="/assets/css/tailwind.output.css" />


</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->

        @auth
            @if (Auth::user()->admin)
                @include('components.sidebar-admin')
            @endif
            @if (Auth::user()->staff)
                @include('components.sidebar-staff')
            @endif
            @if (!Auth::user()->admin && !Auth::user()->staff)
                @include('components.sidebar')
            @endif
        @endauth
        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>

            @auth
            @if (Auth::user()->admin)
                @include('components.sidebar-movil-admin')
            @endif
            @if (Auth::user()->staff)
                @include('components.sidebar-movil-staff')
            @endif
            @if (!Auth::user()->admin && !Auth::user()->staff)
                @include('components.sidebar-movil')
            @endif
        @endauth

        <div class="flex flex-col flex-1 w-full">
            @include('components.header')
            <main class="h-full overflow-y-auto ">
                {{ $slot }}
            </main>
        </div>
    </div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <x-livewire-alert::scripts />

</body>

</html>
