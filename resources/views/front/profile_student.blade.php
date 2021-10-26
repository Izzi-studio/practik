@extends('layouts.app')

@section('content')

    <section class="gbg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="lmenu">
                        <div class="heading">
                            Профиль
                        </div>
                        <ul>
                            <li>
                                <a class="active" href="#">
                                    <span><img src="/images/person.svg"></span>
                                    Личная информация
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span><img src="/images/lock.svg"></span>
                                    Логин и пароль
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span><img src="/images/messages.svg"></span>
                                    Мои заявки
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span><img src="/images/question.svg"></span>
                                    Помощь
                                </a>
                            </li>
                            <li>
                                <a href="{{route('logout')}}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span><img src="/images/logout.svg"></span>
                                    {{ __('Logout') }}
                                </a>
                            </li>
                        </ul>
                        <div class="fillment">
                            <div class="text">
                                Профиль заполнен на <span class="val">70%</span>
                            </div>
                            <div class="line">
                                <div style="width: 70%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="userblock">
                        <div class="heading">
                            Личная информация
                        </div>
                        <div class="regforms">
                            <div class="shown">
                                <form enctype="multipart/form-data" method="POST"
                                      action="{{ route('profile_update') }}">
                                    @csrf
                                    <input type="hidden" value="PUT" name="_method" />
                                    <div class="section">
                                        <div class="section_name offset-lg-1">
                                            Основная информация -
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-9 offset-lg-1">
                                                <label for="photo" class="col-form-label">
                                                    <div class="avatar" @if(!empty(Auth::user()->avatar))style="background-image: url('{{Auth::user()->avatar}}')"@endif></div>
                                                    <span>
                                                        Загрузить фото профиля
                                                    </span>
                                                </label>
                                                <input accept="image/jpeg,image/png,image/gif" id="photo" type="file" class="form-control" name="photo" value="">
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="first_name"
                                                       class="col-form-label">{{ __('First Name') }}</label>
                                                <input id="first_name" type="text"
                                                       class="form-control @error('first_name') is-invalid @enderror"
                                                       name="first_name"
                                                       value="{{Auth::user()->first_name}}" required
                                                       autocomplete="name" autofocus>
                                                @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="last_name"
                                                       class="col-form-label">{{ __('Last Name') }}</label>
                                                <input id="last_name" type="text"
                                                       class="form-control @error('last_name') is-invalid @enderror"
                                                       name="last_name"
                                                       value="{{Auth::user()->last_name}}" required
                                                       autocomplete="last_name" autofocus>
                                                @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="email"
                                                       class="col-form-label">{{ __('E-Mail Address') }}</label>
                                                <input id="email" type="email"
                                                       class="form-control" readonly
                                                       name="email" value="{{Auth::user()->email}}"
                                                       required autocomplete="email">
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="phone" class="col-form-label">{{ __('Phone') }}</label>
                                                <input id="phone" type="text" class="form-control"
                                                       name="additional_info[phone]"
                                                       value="{{$additional_info['phone']}}">
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="birthday"
                                                       class="col-form-label">{{ __('Birthday') }}</label>
                                                <input id="birthday" type="date" class="form-control"
                                                       name="additional_info[birthday]"
                                                       value="{{$additional_info['birthday']}}"
                                                       required>
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="country"
                                                       class="col-form-label">{{ __('Country') }}</label>
                                                <select id="country" type="text" class="form-control"
                                                        name="additional_info[country]"
                                                        value="{{$additional_info['country']}}">
                                                    <option value="">--Select Country--</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="state"
                                                       class="col-form-label">{{ __('State') }}</label>
                                                <select id="state" type="text" class="form-control"
                                                        name="additional_info[state]"
                                                        value="{{$additional_info['state']}}">
                                                    <option value="">--Select Country--</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="city"
                                                       class="col-form-label">{{ __('City') }}</label>
                                                <input id="city" type="text" class="form-control"
                                                       name="additional_info[city]"
                                                       value="{{$additional_info['city']}}"
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
                                                       value="{{$additional_info['university']}}"
                                                       required>
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="course"
                                                       class="col-form-label">{{ __('Course') }}</label>
                                                <input id="course" type="text" class="form-control"
                                                       name="additional_info[course]"
                                                       value="{{$additional_info['course']}}"
                                                       required>
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="okr" class="col-form-label">{{ __('OKR') }}</label>
                                                <input id="okr" type="text" class="form-control"
                                                       name="additional_info[okr]"
                                                       value="{{$additional_info['okr']}}"
                                                       required>
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="speciality"
                                                       class="col-form-label">{{ __('Speciality') }}</label>
                                                <input id="speciality" type="text" class="form-control"
                                                       name="additional_info[speciality]"
                                                       value="{{$additional_info['speciality']}}"
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
                                                          name="additional_info[experience]">{{$additional_info['experience']}}</textarea>
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
                                                          name="additional_info[hobby]">{{$additional_info['hobby']}}</textarea>
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
                                                          name="additional_info[langs]">{{$additional_info['langs']}}</textarea>
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
                                                       value="{{$additional_info['facebook']}}">
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="linkedin"
                                                       class="col-form-label">{{ __('LinkedIn') }}</label>
                                                <input id="linkedin" type="text" class="form-control"
                                                       name="additional_info[linkedin]"
                                                       value="{{$additional_info['linkedin']}}">
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="instagram"
                                                       class="col-form-label">{{ __('Instagram') }}</label>
                                                <input id="instagram" type="text" class="form-control"
                                                       name="additional_info[instagram]"
                                                       value="{{$additional_info['instagram']}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-3 offset-lg-8">
                                            <button type="submit" class="btn btn-orange">
                                                {{ __('Обновить профиль') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop