@extends('layouts.app')

@section('content')

<section class="logreg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <ul class="toplinks">
                        <li class="fw"><a class="active">{{ __('Reset Password') }}</a></li>
                    </ul>
                    @if (Session::has('message'))
                         <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <form action="{{ route('forget.password.post') }}" method="POST">
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


@stop