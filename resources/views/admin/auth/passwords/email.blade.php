@extends('layouts.default')

<!-- Main Content -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">Сброс пароля
                    <ul class="nav navbar-nav pull-xs-right">
                        <!-- Ссылки авторизации -->
                        @if (Auth::guest())
                            <li class="nav-item"><a href="{{ url('/login') }}">ВХОД</a></li>
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
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form role="form" method="POST" action="{{ url('/password/email') }}">
                        {!! csrf_field() !!}

                        <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="inputEmail" class="form-control-label">E-Mail адрес</label>

                            <div class="col-md-6">
                                <input id="inputEmail" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-envelope m-r-1"></i>Отправить ссылку на сброс пароля
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
