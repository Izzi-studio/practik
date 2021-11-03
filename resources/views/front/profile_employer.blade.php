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
                                <a class="#" href="{{route('my_vacancies')}}">
                                    <span><img src="/images/person.svg"></span>
                                    Позиции
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
                                                <label for="photo_e" class="col-form-label">
                                                    <div class="avatar"
                                                         @if(!empty(Auth::user()->avatar))style="background-image: url('{{Auth::user()->avatar}}')"@endif></div>
                                                    <span>
                                                        Загрузить фото профиля
                                                    </span>
                                                </label>
                                                <input accept="image/jpeg,image/png,image/gif" id="photo_e" type="file"
                                                       class="form-control" name="photo" value="">
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="company_name"
                                                       class="col-form-label">{{ __('Company name') }}</label>
                                                <input id="company_name" type="text" class="form-control"
                                                       name="additional_info[company]"
                                                       value="{{$additional_info['company']}}">
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="contact_person"
                                                       class="col-form-label">{{ __('Contact person') }}</label>
                                                <input id="contact_person" type="text" class="form-control"
                                                       name="additional_info[contact_person]"
                                                       value="{{$additional_info['contact_person']}}">
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="email_e"
                                                       class="col-form-label">{{ __('E-Mail Address') }}</label>
                                                <input id="email_e" type="email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       name="email"
                                                       value="{{Auth::user()->email}}"
                                                       required autocomplete="email">
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="contact_email"
                                                       class="col-form-label">{{ __('Contact Email') }}</label>
                                                <input id="contact_email" type="text" class="form-control"
                                                       name="additional_info[contact_email]"
                                                       value="{{$additional_info['contact_email']}}">
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="telephone"
                                                       class="col-form-label">{{ __('Telephone') }}</label>
                                                <input id="telephone" type="text" class="form-control"
                                                       name="additional_info[telephone]"
                                                       value="{{$additional_info['telephone']}}">
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="register_date"
                                                       class="col-form-label">{{ __('Register Date') }}</label>
                                                <input id="register_date" type="date" class="form-control"
                                                       name="additional_info[register_date]"
                                                       value="{{$additional_info['register_date']}}">
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="address"
                                                       class="col-form-label">{{ __('Address') }}</label>
                                                <input id="address" type="text" class="form-control"
                                                       name="additional_info[address]"
                                                       value="{{$additional_info['address']}}">
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="ederpou"
                                                       class="col-form-label">{{ __('Ederpou') }}</label>
                                                <input id="ederpou" type="text" class="form-control"
                                                       name="additional_info[ederpou]"
                                                       value="{{$additional_info['ederpou']}}">
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="person"
                                                       class="col-form-label">{{ __('Person') }}</label>
                                                <input id="person" type="text" class="form-control"
                                                       name="additional_info[person]"
                                                       value="{{$additional_info['person']}}">
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="opf" class="col-form-label">{{ __('OPF') }}</label>
                                                <input id="opf" type="text" class="form-control"
                                                       name="additional_info[opf]"
                                                       value="{{$additional_info['opf']}}">
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="fax" class="col-form-label">{{ __('Fax') }}</label>
                                                <input id="fax" type="text" class="form-control"
                                                       name="additional_info[fax]"
                                                       value="{{$additional_info['fax']}}">
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
                                                        class="form-control chosen" name="additional_info[activities][]">
                                                    @foreach(json_decode(env('CATEGORIES')) as $key => $category)
                                                        <option @if(in_array($key,$additional_info['activities'])) selected @endif value="{{$key}}">{{$category}}</option>
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
                                                       value="{{$additional_info['facebook']}}">
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="instagram_e"
                                                       class="col-form-label">{{ __('Instagram') }}</label>
                                                <input id="instagram_e" type="text" class="form-control"
                                                       name="additional_info[instagram]"
                                                       value="{{$additional_info['instagram']}}">
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="linkedin_e"
                                                       class="col-form-label">{{ __('Linkedin') }}</label>
                                                <input id="linkedin_e" type="text" class="form-control"
                                                       name="additional_info[linkedin]"
                                                       value="{{$additional_info['linkedin']}}">
                                            </div>
                                            <div class="col-lg-4 offset-lg-1">
                                                <label for="site"
                                                       class="col-form-label">{{ __('Site') }}</label>
                                                <input id="site" type="text" class="form-control"
                                                       name="additional_info[site]"
                                                       value="{{$additional_info['site']}}">
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