@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">Bejelentkezés</div>

                <div class="card-body">
                    <div style="width: 95%; margin-left: auto; margin-right: auto;">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email">E-mail</label>
                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email"
                                       value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="password">Jelszó</label>

                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Emlékezz rám!
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-primary">
                                    Bejelentkezés
                                </button>
                            </div>
                            <a href="{{ route('password.request') }}" style="margin-left: -15px;">
                                Elfelejtetted a jelszavadat?
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
