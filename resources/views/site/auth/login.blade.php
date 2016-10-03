@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">ВХОД
                    <ul class="nav navbar-nav pull-xs-right">
                        <!-- Ссылки авторизации -->
                        @if (Auth::guest())
                            <li class="nav-item"><a href="{{ url('/register') }}">РЕГИСТРАЦИЯ</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out m-r-1"></i>ВЫХОД</a>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="card-block">
                    <form class="" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="inputEmail" class="col-md-4 form-control-label">E-Mail адрес</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="{{ old('email') }}" autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="inputPassword" class="col-md-4 form-control-label">Пароль</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember"> Запомнить меня </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in m-r-1"></i>Вход
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Забыли свой пароль?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
