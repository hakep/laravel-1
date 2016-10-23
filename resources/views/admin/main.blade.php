<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('panel/css/vendor.css') }}">
    @stack('css')
    <link rel='stylesheet' href="{{ asset('panel/css/style.css') }}">
    <title>@yield('title')</title>
</head>
<body class="admin">

@include('admin.components.header')

<div class="wrapper-content">
@include('admin.components.aside')

@yield('content')
</div>

<script src="{{ asset('panel/js/vendor.js') }}"></script>
@stack('scripts')
<script src="{{ asset('panel/js/main.js') }}"></script>
</body>
</html>