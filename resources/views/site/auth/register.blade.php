@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">РЕГИСТРАЦИЯ
                    <ul class="nav navbar-nav pull-xs-right">
                        <!-- Ссылки авторизации -->
                        @if (Auth::guest())
                            <li class="nav-item"><a href="{{ url('/login') }}">ВХОД</a></li>
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
                    <form role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="inputName" class="col-md-4 form-control-label">Имя</label>

                            <div class="col-md-6">
                                <input id="inputName" type="text" class="form-control" name="name" placeholder="Имя" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="inputEmail" class="col-md-4 form-control-label">E-Mail адрес</label>

                            <div class="col-md-6">
                                <input id="inputEmail" type="email" class="form-control" name="email" placeholder="E-Mail" value="{{ old('email') }}">

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
                                <input id="inputPassword" type="password" placeholder="Пароль" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="inputConfirm" class="col-md-4 form-control-label">Повторите пароль</label>

                            <div class="col-md-6">
                                <input id="inputConfirm" type="password" placeholder="Повторить пароль" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user m-r-1"></i>Зарегистрироваться
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
