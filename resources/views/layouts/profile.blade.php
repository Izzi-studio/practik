@include('layouts.header')
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
                                <a class="active" href="{{route('vacancies.index')}}">
                                    <span><img src="/images/document.svg"></span>
                                    Позиции
                                </a>
                            </li>
                            <li>
                                <a href="{{route('proposals.index')}}">
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
                                @yield('content')
                    </div>
                </div>

            </div>
        </div>
    </section>

    @include('layouts.footer')
