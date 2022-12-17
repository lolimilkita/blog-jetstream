<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- Facebook Meta --}}
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ config('app.url') }}/@yield('og:image')">
<meta property="og:title" content="@yield('og:title')">

<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

<!-- Scripts -->
<script src="{{ asset('js/main.js') }}" defer></script>
<script src="{{ asset('js/drop-down.js') }}" defer></script>
@vite(['resources/css/app.css', 'resources/js/app.js'])

<title>@yield('title', 'Blog')</title>

@livewireStyles