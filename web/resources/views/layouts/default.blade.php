<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>
    @include('includes.header')

    <main class="min-h-[calc(100dvh-104px)]">
        @if (isset($header))
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        @endif

        @if (view()->hasSection('content'))
            @yield('content')
        @else
            {{ $slot }}
        @endif
    </main>

    @include('includes.footer')

    @livewireScripts
    @vite('resources/js/app.js')
</body>
</html>
