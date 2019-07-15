<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body>

{{-- Show errors, if any.. --}}
@include('partials.errors')

{{-- Yield the header section --}}
@yield('header')

{{-- Yield the main content --}}
<div class="container">
    @yield('content')
</div>

{{-- Include the footer content --}}
@include('partials.footer')

</body>

<!-- App js ================================================= -->
<script src="{{ mix('js/app.js') }}" charset="utf-8"></script>


</html>
