<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="{{ config('w-auth.show.dark-mode', true) ? 'dark' : '' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Styles / Scripts --}}
    <link rel="stylesheet" href="{{ asset('vendor/webvelopers/auth/css/app.css') }}">
    <script defer src="{{ url('vendor/webvelopers/auth/js/app.js') }}"></script>
</head>

<body class="main">
    @yield('content')

    @yield('script')
</body>

</html>