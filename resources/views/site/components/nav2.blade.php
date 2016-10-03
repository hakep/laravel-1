<nav class="navbar navbar-dark bg-inverse navbar-full">
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#CollapsingNavbar">
        &#9776;</button>
    <div class="collapse navbar-toggleable-xs" id="CollapsingNavbar">
        <!-- Левая сторона меню -->
        <ul class="nav navbar-nav">
            <li class="nav-item"><a class="nav-link" href="/">Главная</a></li>
            <li class="nav-item"><a class="nav-link" href="/page/1">Услуги</a></li>
            <li class="nav-item"><a class="nav-link" href="/контакты">Контакты</a></li>
            <li class="nav-item"><a class="nav-link" href="/page/3">Галерея</a></li>
        </ul>
        <!-- Правая сторона меню -->
        <ul class="nav navbar-nav pull-xs-right">
            @if (Auth::guest())
                <li class="nav-item"><a class="nav-link" href="/panel">ПАНЕЛЬ OZ</a></li>
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ url('/panel') }}"><i class="fa fa-user-md m-r-1"></i>ПАНЕЛЬ OZ</a>
                        <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out m-r-1"></i>ВЫХОД</a>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</nav>