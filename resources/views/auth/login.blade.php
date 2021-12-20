@extends('layouts.app')

@section('content')

    <section class="logreg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                @if ($message = Session::get('error'))
                    <p class="alert alert-warning">{{ $message }}</p>
                @endif
                    <ul class="toplinks">
                        <li><a class="active" href="{{route('login')}}">Вход</a></li>
                        <li><a href="{{route('register')}}">Регистрация</a></li>
                    </ul>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="inp_group">
                            <input placeholder="{{ __('E-Mail Address') }}" id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="inp_group">
                            <input placeholder="{{ __('Password') }}" id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password"
                                   required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="row justify-content-between align-items-center mbot">
                            <div class="col-lg-6">
                                <input class="form-check-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            <div class="col-lg-6 text-right">
                                @if (Route::has('forget.password.get'))
                                    <a class="btn-link" href="{{ route('forget.password.get') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-orange">
                            {{ __('Login') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
