<!DOCTYPE html>
<html  
    x-data="{ darkMode: localStorage.getItem('dark') === 'true'} "
    x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{ 'dark': darkMode }"
    lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @yield('metas')

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ $setting->favicon }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">

    <!-- Livewire Styles -->
    @livewireStyles

    <!-- Alpine Core -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Scripts -->
    <script src="{{ url(mix('js/app.js')) }}" defer></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>

<body x-data="{
    sidebar: false,
    profile: false,
    notifica: false,
    isSideMenuOpen: false
    
}">
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': sidebar }">
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

        <div x-show="sidebar" x-transition:enter="transition ease-in-out duration-150"
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
