<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body class="container">


@include('partials.errors')


@yield('content')

@include('partials.footer')
@include('partials.footer_scripts')

</body>


</html>
