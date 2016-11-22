@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">Сброс пароля</div>

                <div class="card-block">
                    <form role="form" method="POST" action="{{ url('/password/reset') }}">
                        {!! csrf_field() !!}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="inputEmail" class="form-groupcontrol-label">E-Mail адрес</label>

                            <div class="col-md-6">
                                <input id="inputEmail" placeholder="Email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="inputPassword" class="form-control-label">Пароль</label>

                            <div class="col-md-6">
                                <input id="inputPassword" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="inputConfirm" class="form-control-label">Повтор пароля</label>
                            <div class="col-md-6">
                                <input id="inputConfirm" type="password" class="form-control" name="password_confirmation">

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
                                    <i class="fa fa-btn fa-refresh m-r-1"></i>Сбросить пароль
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
