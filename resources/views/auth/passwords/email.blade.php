@extends('layouts.app')

@section('content')

    <section class="logreg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <ul class="toplinks">
                        <li class="fw"><a class="active">{{ __('Reset Password') }}</a></li>
                    </ul>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
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
                        <button type="submit" class="btn btn-orange">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
