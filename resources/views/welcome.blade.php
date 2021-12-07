@extends('layouts.app')
@section('content')
    <section id="intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1>Начни свою карьеру здесь</h1>
                    <div class="subtext">
                        Прохождение практики, программы стажировок и повышения квалификации у лучших работодателей
                        Украины
                    </div>
                </div>
                <div class="col-lg-6 abs">
                    <img title="intro" alt="intro" src="/images/intro.png">
                </div>
                <div class="col-lg-12">
                    <form action="{{ route('vacancies.search') }}" id="search" method="GET">
                        <input type="text" placeholder="Поиск по ключевым словам" name="search" value="{{ request()->search ?? '' }}" />
                        <select name="city" class="chosen">
                            @foreach($cities as $city)
                                <option value="{{ $city->id, old('cities') ? 'selected' : ''}}">{{ $city->name}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-orange">
                            <img src="/images/search.svg">
                        </button>
                    </form>
                    <div class="tags">
                        <span class="grey">Популярное:</span>
                        <ul>
                            <li><a href="#">Маркетинг</a></li>
                            <li><a href="#">IT</a></li>
                            <li><a href="#">Банки</a></li>
                            <li><a href="#">Бухгалтерия</a></li>
                            <li><a href="#">Дизайн</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="vacs">
        <div class="container">
            <h2>Новые вакансии</h2>
            <div class="sub">Начни карьеру в компании твоей мечты. <a href="{{ route('categories') }}">Подобрать вакансии по категориям.</a></div>
            <div class="vacancies">
                <div class="row ">
                    @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                    @foreach ($allVacancies as $vacancy)
                    <div class="col-lg-4 item">
                        <div class="t_panel">
                            <div class="image">
                                <img src="/images/companies/p_morris.svg">
                            </div>
                            <div class="nt">
                                <div class="title">
                                {{ $vacancy->user->name }}
                                </div>
                                <div class="time">
                                {{ date("d-m-Y", strtotime($vacancy->created_at)) }}
                                </div>
                            </div>
                        </div>
                        <div class="name">
                        {{ $vacancy->title }}
                        </div>
                        <div class="tags">
                            <span>Практика</span>
                            <span>
                            {{ $vacancy->city ? $vacancy->city->name : "Field not filled" }}
                            </span>
                        </div>
                        <div class="cat">
                            <a href="#">
                                Менеджмент
                            </a>
                        </div>
                    </div>            
                    @endforeach
                    <div class="col-lg-9 item">
                        <div class="num_block">
                            <div class="num">
                                +585
                            </div>
                            <div class="sub">
                                Вакансий на Practicum. <a href="{{ route('vacancies.search') }}">Смотреть все</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="companies">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="row no-gutters align-items-center justify-content-between">
                    <div><img src="/images/companies/nestle.svg"></div>
                    <div><img src="/images/companies/metinvest.svg"></div>
                    <div><img src="/images/companies/ey.svg"></div>
                    <div><img src="/images/companies/oneplusone.svg"></div>
                    <div><img src="/images/companies/adidas.svg"></div>
                    <div><img src="/images/companies/roshen.svg"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="tn">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="/images/tn1.png">
                </div>
                <div class="col-lg-6">
                    <h2>На старт!<br />Внимание! Марш!</h2>
                    <div class="desc">
                        Прохождение стажировки даст тебе возможность найти работу мечты гараздо быстрее других выпускников. Для старта тебе необходимо разместить резюме.
                    </div>
                    <a class="btn btn-orange">
                        Разместить резюме
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="destination">
        <div class="container">
            <h2>Выбери свое направление</h2>
            <div class="sub">Найди второй дом. <a href="#">Подобрать вакансии по интересам.</a></div>
            <div class="row items">
                <div class="col-lg-4 item">
                    <div class="image">
                        <img src="/images/inter1.svg">
                    </div>
                    <div class="title">
                        Маркетинг, реклама, PR
                    </div>
                    <div class="num">
                        <a href="#">890 вакансий</a>
                    </div>
                </div>
                <div class="col-lg-4 item">
                    <div class="image">
                        <img src="/images/inter2.svg">
                    </div>
                    <div class="title">
                        IT, компьютеры, интернет
                    </div>
                    <div class="num">
                        <a href="#">700 вакансий</a>
                    </div>
                </div>
                <div class="col-lg-4 item">
                    <div class="image">
                        <img src="/images/inter3.svg">
                    </div>
                    <div class="title">
                        Медицина, фармацевтика
                    </div>
                    <div class="num">
                        <a href="#">700 вакансий</a>
                    </div>
                </div>
                <div class="col-lg-4 item">
                    <div class="image">
                        <img src="/images/inter4.svg">
                    </div>
                    <div class="title">
                        Юриспруденция
                    </div>
                    <div class="num">
                        <a href="#">890 вакансий</a>
                    </div>
                </div>
                <div class="col-lg-4 item">
                    <div class="image">
                        <img src="/images/inter5.svg">
                    </div>
                    <div class="title">
                        Бухгалтерия, аудит
                    </div>
                    <div class="num">
                        <a href="#">890 вакансий</a>
                    </div>
                </div>
                <div class="col-lg-4 item">
                    <div class="num_block">
                        <div class="num">
                            +22
                        </div>
                        <div class="sub">
                            Направлений на Practicum. <a href="#">Смотреть все</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tn">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2>Платформа новых<br />возможностей</h2>
                    <div class="desc">
                        Мы пройдем с тобой путь трудоуйстройства вместе,<br />так как заинтересованы в обеспечении лучших кадров для нашей страны. Доверься нам.
                    </div>
                    <a class="btn btn-orange">
                        Разместить резюме
                    </a>
                </div>
                <div class="col-lg-6">
                    <img src="/images/tn2.png">
                </div>
            </div>
        </div>
    </section>
    <section class="reviews">
        <div class="container">
            <div class="row items">
                <div class="col-lg-5">
                    <div class="item">
                        <div class="desc">
                            В июле и августе 2019 года я проходила стажировку в компании CLS. Благодарна за возможность получить практические навыки, которые будут актуальны не только для юриста, но и для любого работника интеллектуального труда в целом.
                        </div>
                        <div class="info row no-gutters align-items-center">
                            <div class="ava">
                                <img src="/images/ava.png">
                            </div>
                            <div class="text">
                                <div class="name">
                                    Петрова Алина
                                </div>
                                <div class="uni">
                                    Студентка университета им. Т. Шевченка
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="item">
                        <div class="desc">
                            В июле и августе 2019 года я проходила стажировку в компании CLS. Благодарна за возможность получить практические навыки, которые будут актуальны не только для юриста, но и для любого работника интеллектуального труда в целом.
                        </div>
                        <div class="info row no-gutters align-items-center">
                            <div class="ava">
                                <img src="/images/ava.png">
                            </div>
                            <div class="text">
                                <div class="name">
                                    Петрова Алина
                                </div>
                                <div class="uni">
                                    Студентка университета им. Т. Шевченка
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="item">
                        <div class="desc">
                            В июле и августе 2019 года я проходила стажировку в компании CLS. Благодарна за возможность получить практические навыки, которые будут актуальны не только для юриста, но и для любого работника интеллектуального труда в целом.
                        </div>
                        <div class="info row no-gutters align-items-center">
                            <div class="ava">
                                <img src="/images/ava.png">
                            </div>
                            <div class="text">
                                <div class="name">
                                    Петрова Алина
                                </div>
                                <div class="uni">
                                    Студентка университета им. Т. Шевченка
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="item">
                        <div class="desc">
                            В июле и августе 2019 года я проходила стажировку в компании CLS. Благодарна за возможность получить практические навыки, которые будут актуальны не только для юриста, но и для любого работника интеллектуального труда в целом.
                        </div>
                        <div class="info row no-gutters align-items-center">
                            <div class="ava">
                                <img src="/images/ava.png">
                            </div>
                            <div class="text">
                                <div class="name">
                                    Петрова Алина
                                </div>
                                <div class="uni">
                                    Студентка университета им. Т. Шевченка
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cta">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9">
                    <h2>Конечно ты уже хочешь<br />разместить резюме - тогда не жди ;)</h2>
                </div>
                <div class="col-lg-3">
                    <a class="btn btn-orange">
                        Разместить резюме
                    </a>
                </div>
            </div>
        </div>
    </section>
@stop