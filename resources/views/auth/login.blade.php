@extends('layouts.app')

@section('content')
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <div class="form-group">
        <input id="login_name" placeholder="Nom d'utilisateur ou email" type="text" class="form-input{{ $errors->has('login_name') ? ' has-error' : '' }}" name="login_name" value="{{ old('login_name') }}" required autofocus>
        @if ($errors->has('login_name'))
            <span class="help-block">
                <strong>{{ $errors->first('login_name') }}</strong>
            </span>
        @endif
        </div>
        <div class="form-group">
        <input id="password" placeholder="Mot de passe" type="password" class="form-input{{ $errors->has('password') ? ' has-error' : '' }}" name="password" required>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        </div>
        <button type="submit" class="btn btn-primary">
            @lang('auth.sign_in')
        </button>
        <label>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> @lang('auth.remember_me')
        </label>
        <a href="{{ url('/password/reset') }}">
            @lang('auth.forgot_your_password?')
        </a>
    </form>
@endsection
