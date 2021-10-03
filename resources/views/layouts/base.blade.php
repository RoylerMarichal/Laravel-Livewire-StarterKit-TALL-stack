<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('metas')


    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/img/favicon.png">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
    @livewireStyles

    <!-- Scripts -->

    <script src="{{ url(mix('js/app.js')) }}"></script>
    <script src="/alpine.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5EMB4SY58D"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-5EMB4SY58D');
    </script>
    <style>
        [x-cloak] {
            display: none;
        }

    </style>
</head>

<body class="min-w-screen">
    @yield('body')

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    </script>


    <x-livewire-alert::scripts />

    @yield('scripts')

    @auth
        {{-- <livewire:alerts-livewire />
        <livewire:events-livewire /> --}}
        <livewire:play-waiting-player />
    @endauth
</body>

</html>
