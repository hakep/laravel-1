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
<body id="tpl-main">

<header id="header">
    <div class="container">
        <div class="row">
            <div class="logo col-md-4"><a href="/">logo</a></div>
            <div class="devis col-md-4">main1<br>devis</div>
            <div class="adress col-md-4"><a href="/admin" target="_blank">admin</a></div>
        </div>
    </div>
</header>

<nav id="menu1">
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#CollapsingNavbar">☰</button>
    <div class="container collapse navbar-toggleable-xs " id="CollapsingNavbar">
        <ul class="nav navbar-nav row">
            <li class="nav-item"><a class="nav-link active" href="/">Главная</a></li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Услуги</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Услуга_1</a>
                    <a class="dropdown-item" href="#">Услуга_2</a>
                    <a class="dropdown-item" href="#">Услуга_3</a>
                    <a class="dropdown-item" href="#">Услуга_4</a>
                </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="#">Фотогаллерея</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Информация</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Новости</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Контакты</a></li>
        </ul>
    </div>
</nav>

@yield('content')

<footer id="footer">
    <div class="container">
        <div class="row">
            <p class="m-a-0">Power by OZ</p>
        </div>
    </div>
</footer>

<script src="{{ url('js/app.js') }}"></script>
</body>
</html>