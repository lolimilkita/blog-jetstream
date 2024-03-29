<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles Choices JS -->
        <link rel="stylesheet" href="{{ asset('css/choices.css') }}">

        {{-- Livewire --}}
        @livewireStyles

        {{-- Blade Ui Kit --}}
        @bukStyles(true)

    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="flex max-w-7xl mx-auto py-6 px-4 space-x-8 sm:px-6 lg:px-8">
                        {{ $header }}
                        @if (isset($nav))
                            {{ $nav }}
                        @endif
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        {{-- Livewire --}}
        @livewireScripts

        {{-- Blade Ui Kit --}}
        @bukScripts(true)

    </body>
</html>
