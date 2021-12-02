@extends('layouts.profile')
@section('content')
<div class="heading">
Логин и пароль
  </div>
        <div class="password_settings">
            <div class="shown">

                <form method="POST" action="{{ route('update.password') }}">
                    @csrf 

                    @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach 
                    
                    @if ($message = Session::get('success'))
                         <p>{{ $message }}</p>
                     @endif

                    <div class="col-lg-7 offset-lg-1">
                        <label for="company_name" class="col-form-label">{{ __('Company name') }}</label>
                            <input id="company_name" type="text" disabled="disabled" class="form-control" name="additional_info[company]" value="{{$additional_info['company']}}">

                    </div>

                    <div class="section_name offset-lg-1">
                        Смена пароля
                    </div>
                    <div class="">
                        <div class="col-lg-7 offset-lg-1">
                            <label for="password" class="col-form-label">Current Password</label>
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                        </div>

                        <div class="col-lg-7 offset-lg-1">
                            <label for="password" class="col-form-label">New Password</label>
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                        </div>

                        <div class="col-lg-7 offset-lg-1">
                            <label for="password" class="col-form-label">New Confirm Password</label>

                            <div class="">
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-8">
                        <button type="submit" class="btn btn-orange">
                            Update Password
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection