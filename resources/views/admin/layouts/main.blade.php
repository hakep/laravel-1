<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ url('css/admin/admin.css') }}">
    <link rel='stylesheet' href="{{ url('css/font-awesome.min.css') }}">
    <title>@yield('title')</title>
</head>
<body class="admin">

@include('admin.components.header')

<div class="wrapper-content">
@include('admin.components.aside')

@yield('content')
</div>

<script src="{{ url('js/admin/admin.js') }}"></script>
</body>
</html>