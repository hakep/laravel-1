<header id="header">
    <button id="button-aside"><i class="fa fa-bars" aria-hidden="true"></i></button>
    @yield('panel-page')
    <form action="{{ url('/logout') }}" method="POST">{!! csrf_field() !!}
        <button type="submit" class="btn btn-link">Logout</button>
    </form>
    <a href="/admin" id="button-home"><i class="fa fa-times" aria-hidden="true"></i></a>
</header>
