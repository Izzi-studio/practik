@extends('layouts.profile')
@section('content')
<div class="heading">
Логин и пароль
  </div>
        <div class="password_settings">
            <div class="shown">
                @if ($message = Session::get('success'))
                    <p class="alert alert-success">{{ $message }}</p>
                @endif
                <form method="POST" action="{{ route('update.password') }}">
                    @csrf 

                    @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>                    
                    @endforeach 
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
<script>
$("div[name=''], input").on("keyup", function(){
    if($(this).val() != "" && $("input").val() != ""){
        $("button[type='submit']").removeAttr("disabled");
    } else {
        $("button[type='submit']").attr("disabled", "disabled");
    }
});
</script>
@endsection