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
                                <a href="#">
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
                                <a class="active" href="{{route('vacancies_employer')}}">
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
                        Позиции
                        </div>
                        <div class="regforms">
                            <div class="shown">
                                <form enctype="multipart/form-data" method="POST"
                                      action="{{ route('profile_update') }}">
                                    @csrf
                                    <input type="hidden" value="PUT" name="_method" />
                                    <div class="section">
                                        <div class="form-group row mb-0">
                                            <div class="col-md-3 offset-lg-8">
                                                <button type="submit" class="btn btn-orange">
                                                    {{ __('Добавить позицию') }}
                                                </button>
                                            </div>
                                        </div>

                                            <div class="section_name offset-lg-1">
                                                Основная информация -
                                            </div>

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