<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    <link rel="shortcut icon" href="/img/favicon.png" type="image/png">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <title>@yield('title')</title>
</head>
<body>

@include('site.components.header')

@include('site.components.menu1')

@yield('content')

@include('site.components.footer')

<script src="{{ url('js/app.js') }}"></script>
</body>
</html>