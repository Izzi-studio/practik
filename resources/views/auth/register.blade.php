@extends('layouts.app')

@section('content')

    @php $type = ''; @endphp
    @error('form_type')
    @php $type = $message; @endphp
    @enderror
    <section class="logreg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <ul class="toplinks">
                        <li><a href="{{route('login')}}">Вход</a></li>
                        <li><a class="active" href="{{route('register')}}">Регистрация</a></li>
                    </ul>
                    <form name="choose_type" method="POST" action="{{route('check-email')}}">
                        @csrf
                        <div class="inp_group">
                            <div class="alert alert-danger inuse d-none" role="alert">
                                Current Email is already in use!
                            </div>
                            <input placeholder="{{ __('E-Mail Address') }}" type="email"
                                   class="form-control @error('email') is-invalid @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="inp_group">
                            <input placeholder="{{ __('Password') }}" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password"
                                   required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="row mbot">
                            <div class="col-lg-6">
                                <input checked="checked" type="radio" name="type" id="type_student" value="student"/>
                                <label class="form-check-label" for="type_student">Студент</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="radio" name="type" id="type_employer" value="employer"/>
                                <label class="form-check-label" for="type_employer">Работодатель</label>
                            </div>
                        </div>
                        <div class="mbot text-center policy">
                            Регистрируясь, вы соглашаетесь с нашей <a href="">Политикой конфиденциальности и условиями
                                пользования</a>
                        </div>
                        <button type="submit" class="btn btn-orange">{{ __('Register') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="regforms">
        <div class="container">
            <div class="col-lg-10 offset-lg-1">
                <div class="student">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('register',['type'=>'student']) }}">
                        @csrf
                        <div class="formhead">
                            <div class="offset-lg-1">
                                Шаг 2. Личная информация
                            </div>
                        </div>
                        <div class="section">
                            <div class="section_name offset-lg-1">
                                Основная информация -
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-9 offset-lg-1">
                                    <label for="photo" class="col-form-label">
                                        <div class="avatar"></div>
                                        <span>
                                            Загрузить фото профиля
                                        </span>
                                    </label>
                                    <input accept="image/jpeg,image/png,image/gif" id="photo" type="file" class="form-control" name="photo" value="">
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="first_name" class="col-form-label">{{ __('First Name') }}</label>
                                    <input id="first_name" type="text"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           name="first_name"
                                           value="@if($type == 'student') {{ old('first_name') }} @endif" required
                                           autocomplete="name" autofocus>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="last_name" class="col-form-label">{{ __('Last Name') }}</label>
                                    <input id="last_name" type="text"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           name="last_name"
                                           value="@if($type == 'student') {{ old('last_name') }} @endif" required
                                           autocomplete="last_name" autofocus>
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email"
                                           class="form-control @if($type == 'student')  @error('email') is-invalid @enderror @endif"
                                           name="email" value="@if($type == 'student') {{ old('email') }} @endif"
                                           required autocomplete="email">
                                    @if($type == 'student')
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    @endif
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="phone" class="col-form-label">{{ __('Phone') }}</label>
                                    <input id="phone" type="text" class="form-control" name="additional_info[phone]"
                                           value="@if($type == 'student'){{old('additional_info')['phone']}}@endif">
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="birthday" class="col-form-label">{{ __('Birthday') }}</label>
                                    <input id="birthday" type="date" class="form-control"
                                           name="additional_info[birthday]"
                                           value="@if($type == 'student'){{old('additional_info')['birthday']}}@endif"
                                           required>
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="country"
                                           class="col-form-label">{{ __('Country') }}</label>
                                    <select id="country" type="text" class="form-control"
                                            name="additional_info[country]"
                                            value="@if($type == 'student'){{old('additional_info')['country']}}@endif"
                                            required>
                                        <option value="">--Select Country--</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="state"
                                           class="col-form-label">{{ __('State') }}</label>
                                    <select id="state" type="text" class="form-control" name="additional_info[state]"
                                            value="@if($type == 'student'){{old('additional_info')['state']}}@endif"
                                            required>
                                        <option value="">--Select Country--</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="city"
                                           class="col-form-label">{{ __('City') }}</label>
                                    <input id="city" type="text" class="form-control" name="additional_info[city]"
                                           value="@if($type == 'student'){{old('additional_info')['city']}}@endif"
                                           required>
                                </div>
                            </div>
                        </div>

                        <div class="section">
                            <div class="section_name offset-lg-1">
                                Образование -
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="university"
                                           class="col-form-label">{{ __('University') }}</label>
                                    <input id="university" type="text" class="form-control"
                                           name="additional_info[university]"
                                           value="@if($type == 'student'){{old('additional_info')['university']}}@endif"
                                           required>
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="course"
                                           class="col-form-label">{{ __('Course') }}</label>
                                    <input id="course" type="text" class="form-control" name="additional_info[course]"
                                           value="@if($type == 'student'){{old('additional_info')['course']}}@endif"
                                           required>
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="okr" class="col-form-label">{{ __('OKR') }}</label>
                                    <input id="okr" type="text" class="form-control" name="additional_info[okr]"
                                           value="@if($type == 'student'){{old('additional_info')['okr']}}@endif"
                                           required>
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="speciality"
                                           class="col-form-label">{{ __('Speciality') }}</label>
                                    <input id="speciality" type="text" class="form-control"
                                           name="additional_info[speciality]"
                                           value="@if($type == 'student'){{old('additional_info')['speciality']}}@endif"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="section">
                            <div class="section_name offset-lg-1">
                                Добавить опыт работы +
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-9 offset-lg-1">
                                    <label for="experience"
                                           class="col-form-label">{{ __('Experience') }}</label>
                                    <textarea id="experience" class="form-control"
                                              name="additional_info[experience]">@if($type == 'student'){{old('additional_info')['experience']}}@endif</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="section">
                            <div class="section_name offset-lg-1">
                                Добавить интересы +
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-9 offset-lg-1">
                                    <label for="hobby"
                                           class="col-form-label">{{ __('Hobby') }}</label>
                                    <textarea id="hobby" class="form-control"
                                              name="additional_info[hobby]">@if($type == 'student'){{old('additional_info')['hobby']}}@endif</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="section">
                            <div class="section_name offset-lg-1">
                                Знание иностранных языков +
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-9 offset-lg-1">
                                    <label for="langs"
                                           class="col-form-label">{{ __('Languages') }}</label>
                                    <textarea id="langs" class="form-control"
                                              name="additional_info[langs]">@if($type == 'student'){{old('additional_info')['langs']}}@endif</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="section">
                            <div class="section_name offset-lg-1">
                                Ссылки на социальные сети +
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="facebook"
                                           class="col-form-label">{{ __('Facebook') }}</label>
                                    <input id="facebook" type="text" class="form-control"
                                           name="additional_info[facebook]"
                                           value="@if($type == 'student'){{old('additional_info')['facebook']}}@endif">
                                </div>

                                <div class="col-lg-4 offset-lg-1">
                                    <label for="linkedin"
                                           class="col-form-label">{{ __('LinkedIn') }}</label>
                                    <input id="linkedin" type="text" class="form-control"
                                           name="additional_info[linkedin]"
                                           value="@if($type == 'student'){{old('additional_info')['linkedin']}}@endif">
                                </div>


                                <div class="col-lg-4 offset-lg-1">
                                    <label for="instagram"
                                           class="col-form-label">{{ __('Instagram') }}</label>
                                    <input id="instagram" type="text" class="form-control"
                                           name="additional_info[instagram]"
                                           value="@if($type == 'student'){{old('additional_info')['instagram']}}@endif">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row d-none">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control  @if($type == 'student') @error('password') is-invalid @enderror @endif"
                                       name="password" required autocomplete="new-password">
                                @if($type == 'student')
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @endif
                            </div>
                        </div>
                        <div class="form-group row d-none">
                            <label for="password-confirm"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-3 offset-lg-8">
                                <button type="submit" class="btn btn-orange">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="employer">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('register',['type'=>'employer']) }}">
                        @csrf
                        <div class="formhead">
                            <div class="offset-lg-1">
                                Шаг 2. Личная информация
                            </div>
                        </div>
                        <div class="section">
                            <div class="section_name offset-lg-1">
                                Основная информация -
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-9 offset-lg-1">
                                    <label for="photo_e" class="col-form-label">
                                        <div class="avatar"></div>
                                        <span>
                                            Загрузить фото профиля
                                        </span>
                                    </label>
                                    <input accept="image/jpeg,image/png,image/gif" id="photo_e" type="file" class="form-control" name="photo" value="">
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="company_name"
                                           class="col-form-label">{{ __('Company name') }}</label>
                                    <input id="company_name" type="text" class="form-control"
                                           name="additional_info[company]"
                                           value="@if($type == 'employer'){{old('additional_info')['company']}}@endif">
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="contact_person"
                                           class="col-form-label">{{ __('Contact person') }}</label>
                                    <input id="contact_person" type="text" class="form-control"
                                           name="additional_info[contact_person]"
                                           value="@if($type == 'employer'){{old('additional_info')['contact_person']}}@endif">
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="email_e"
                                           class="col-form-label">{{ __('E-Mail Address') }}</label>
                                    <input id="email_e" type="email"
                                           class="form-control @if($type == 'employer') @error('email') is-invalid @enderror @endif"
                                           name="email" value="@if($type == 'employer') {{ old('email') }} @endif"
                                           required autocomplete="email">
                                    @if($type == 'employer')
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    @endif
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="contact_email"
                                           class="col-form-label">{{ __('Contact Email') }}</label>
                                    <input id="contact_email" type="text" class="form-control"
                                           name="additional_info[contact_email]"
                                           value="@if($type == 'employer'){{ old('additional_info')['contact_email']}}@endif">
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="telephone"
                                           class="col-form-label">{{ __('Telephone') }}</label>
                                    <input id="telephone" type="text" class="form-control"
                                           name="additional_info[telephone]"
                                           value="@if($type == 'employer'){{old('additional_info')['telephone']}}@endif">
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="register_date"
                                           class="col-form-label">{{ __('Register Date') }}</label>
                                    <input id="register_date" type="date" class="form-control"
                                           name="additional_info[register_date]"
                                           value="@if($type == 'employer'){{old('additional_info')['register_date']}}@endif">
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="address"
                                           class="col-form-label">{{ __('Address') }}</label>
                                    <input id="address" type="text" class="form-control" name="additional_info[address]"
                                           value="@if($type == 'employer'){{old('additional_info')['address']}}@endif">
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="ederpou"
                                           class="col-form-label">{{ __('Ederpou') }}</label>
                                    <input id="ederpou" type="text" class="form-control" name="additional_info[ederpou]"
                                           value="@if($type == 'employer'){{old('additional_info')['ederpou']}}@endif">
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="person"
                                           class="col-form-label">{{ __('Person') }}</label>
                                    <input id="person" type="text" class="form-control" name="additional_info[person]"
                                           value="@if($type == 'employer'){{old('additional_info')['person']}}@endif">
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="opf" class="col-form-label">{{ __('OPF') }}</label>
                                    <input id="opf" type="text" class="form-control" name="additional_info[opf]"
                                           value="@if($type == 'employer'){{old('additional_info')['opf']}}@endif">
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="fax" class="col-form-label">{{ __('Fax') }}</label>
                                    <input id="fax" type="text" class="form-control" name="additional_info[fax]"
                                           value="@if($type == 'employer'){{old('additional_info')['fax']}}@endif">
                                </div>
                            </div>
                        </div>
                        <div class="section">
                            <div class="section_name offset-lg-1">
                                Направления работы -
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-9 offset-lg-1">
                                    <label for="activities_main"
                                           class="col-form-label">{{ __('Activities Main') }}</label>
                                    <select data-placeholder=" " multiple id="activities_main"
                                            class="form-control chosen" name="additional_info[activities][]"
                                            value="@if($type == 'employer'){{old('additional_info')['activities']}}@endif">
                                        @foreach(json_decode(env('CATEGORIES')) as $key => $category)
                                            <option value="{{$key}}">{{$category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="section">
                            <div class="section_name offset-lg-1">
                                Ссылки на социальные сети -
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="facebook_e"
                                           class="col-form-label">{{ __('Facebook') }}</label>
                                    <input id="facebook_e" type="text" class="form-control"
                                           name="additional_info[facebook]"
                                           value="@if($type == 'employer'){{old('additional_info')['facebook']}}@endif">
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="instagram_e"
                                           class="col-form-label">{{ __('Instagram') }}</label>
                                    <input id="instagram_e" type="text" class="form-control"
                                           name="additional_info[instagram]"
                                           value="@if($type == 'employer'){{old('additional_info')['instagram']}}@endif">
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="linkedin_e"
                                           class="col-form-label">{{ __('Linkedin') }}</label>
                                    <input id="linkedin_e" type="text" class="form-control"
                                           name="additional_info[linkedin]"
                                           value="@if($type == 'employer'){{old('additional_info')['linkedin']}}@endif">
                                </div>
                                <div class="col-lg-4 offset-lg-1">
                                    <label for="site"
                                           class="col-form-label">{{ __('Site') }}</label>
                                    <input id="site" type="text" class="form-control" name="additional_info[site]"
                                           value="@if($type == 'employer'){{old('additional_info')['site']}}@endif">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row d-none">
                            <label for="password_e"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password_e" type="password"
                                       class="form-control @if($type == 'employer') @error('password') is-invalid @enderror @endif"
                                       name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row d-none">
                            <label for="password-confirm_e"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm_e" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-3 offset-lg-8">
                                <button type="submit" class="btn btn-orange">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
