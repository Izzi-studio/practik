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
                                <a  href="{{ route('profile_update') }}">
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
                                <a class="active" href="{{route('my-vacancies')}}">
                                    <span><img src="/images/document.svg"></span>
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
                        
                        <div class="myVacsforms">
                            <div class="shown">
                                <form enctype="multipart/form-data" method="POST"
                                      action="{{ route('profile_update') }}">
                                    @csrf
                                    <input type="hidden" value="PUT" name="_method" />
                                    <div class="section">
                                        <div class="form-group row">
                                            <div class="offset-lg-1">
                                                <a class="btn btn-orange" href="{{ route('vacancies.create') }}">{{ __('Добавить позицию') }}</a>
                                            </div>
                                        </div>
                                        <div class="section_name offset-lg-1">
                                            Основная информация -
                                        </div>
                                        <div class="card mb-4">
                                            <div class="row no-gutters">
                                                <div class="col-md-3">
                                                    <div class="card-body">
                                                        <p class="card-text text-muted">05/11/2021</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Junior Full-stack developer</h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card-body">
                                                        <p class="card-text">Junior Full-stack developer</p>
                                                        <p class="card-text"><small class="text-muted">8 откликов</small></p>
                                                    </div>
                                                </div>
                                                 <div class="col-md-3">
                                                    <div class="card-body">
                                                            <input type="image" class="modif" src="/images/delete.svg" alt="Submit" />
                                                            <input type="image" src="/images/edit.svg" alt="Submit" />
                                                            <input type="image" src="/images/check.svg" alt="Submit"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="card mb-4">
                                            <div class="row no-gutters">
                                                <div class="col-md-3">
                                                    <div class="card-body">
                                                        <p class="card-text text-muted">05/11/2021</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Junior Full-stack developer</h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card-body">
                                                        <p class="card-text">Junior Full-stack developer</p>
                                                        <p class="card-text"><small class="text-muted">15 откликов</small></p>
                                                    </div>
                                                </div>
                                                 <div class="col-md-3">
                                                    <div class="card-body">
                                                            <input type="image" class="modif" src="/images/delete.svg" alt="Submit" />
                                                            <input type="image" src="/images/edit.svg" alt="Submit" />
                                                            <input type="image" src="/images/check.svg" alt="Submit"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                   
                                        <div class="section_name offset-lg-1">
                                            Архив -
                                        </div>
                                        <div class="card mb-4">
                                            <div class="row no-gutters">
                                                <div class="col-md-3">
                                                    <div class="card-body">
                                                        <p class="card-text text-muted">05/11/2021</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Веб-разработчик</h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card-body">
                                                        <p class="card-text">Аудит</p>
                                                        <p class="card-text"><small class="text-muted">3 отклика</small></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card-body">
                                                                <input type="image" src="/images/check.svg" alt="Submit">Найден</input>       
                                                    </div>
                                                </div>
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