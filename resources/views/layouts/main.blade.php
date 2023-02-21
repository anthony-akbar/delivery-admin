<!DOCTYPE html>
<html class="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Delivery @yield('title')</title>
    @yield('style')
    <link rel="stylesheet" href="{{ asset('/css/app2.css') }}"/>
</head>
<body>
@include('partials.top-menu')
<div class="flex overflow-hidden">
    @include('partials.menu')
    <div class="content">
        @yield('content')
    </div>
</div>

@yield('scripts')

<script src="{{ asset('/js/enigma.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>
</html>
