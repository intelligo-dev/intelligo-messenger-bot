@extends('home')

@section('content')

    @include('pages.partials.navigation')

    <div class="container" id="Login-Register-Container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" id="Login-Register-Panel">
                    <div class="panel-heading">Бүртгүүлэх</div>
                    <div class="panel-body">
                        
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('auth.register') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Хэрэглэгчийн нэр</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username" value="{{ old('username') }}">

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Мэйл хаяг</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Нууц үг</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Нууц үгээ давт</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button class="ui inverted blue button"><i class="fa fa-btn fa-user"></i> Бүртгүүлэх</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
