<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ url('css/admin/admin.css') }}">
    <title>@yield('title')</title>
</head>
<body>

@include('admin.components.header')

@include('admin.components.aside')

<script src="{{ url('js/admin/admin.js') }}"></script>
</body>
</html>