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

                    <form action="{{ route('vacancies.search') }}" id="search" method="POST">
                        @csrf
                        <input type="text" placeholder="Поиск по ключевым словам" name="search" value="{{ request()->search ?? '' }}" />
                        <select name="city_id" class="chosen">
                                <option value="">City</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id, old('cities') ? 'selected' : ''}}">{{ $city->name}}</option>
                            @endforeach
                        </select>
                        <select name="duration_id" class="chosen">
                                <option value="">Duration</option>
                            @foreach($durations as $duration)
                                <option value="{{ $duration->id, old('durations') ? 'selected' : ''}}">{{ $duration->name}}</option>
                            @endforeach
                        </select>
                        <select name="form_of_employment_id" class="chosen">
                                <option value="">Form of employment</option>
                            @foreach($form_of_employments as $form_of_employment)
                                <option value="{{ $form_of_employment->id, old('form_of_employments') ? 'selected' : ''}}">{{ $form_of_employment->name}}</option>
                            @endforeach
                        </select>
                        <select name="type_of_employment_id" class="chosen">
                                <option value="">Type of employment</option>
                            @foreach($type_of_employments as $type_of_employment)
                                <option value="{{ $type_of_employment->id, old('type_of_employments') ? 'selected' : ''}}">{{ $type_of_employment->name}}</option>
                            @endforeach
                        </select>
                        <select name="form_of_cooperation_id" class="chosen">
                                <option value="">Form of cooperation</option>
                            @foreach($form_of_cooperations as $form_of_cooperation)
                                <option value="{{ $form_of_cooperation->id, old('form_of_cooperations') ? 'selected' : ''}}">{{ $form_of_cooperation->name}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-orange">
                            <img src="/images/search.svg">
                        </button>
                        <div class="form-group">
                            <div class="tags">
                                <span class="grey">Популярное:</span>
                                <ul name="categories">
                                    <!-- see the code -->
                                    <ul name="categories">
                                        @if ($mostPopularCategories->count())
                                            @foreach ($mostPopularCategories as $category)
                                                <li><input @if(isset($requestData['categories'])  && in_array($category->category_id,$requestData['categories'])) checked @endif style="display: none" type="checkbox" id = "category-{{$category->category_id}}" name="categories[]" value="{{$category->category_id}}"/><label for="category-{{$category->category_id}}">{{$category->name}}</label></li>
                                            @endforeach
                                        @endif
                                    </ul>
                                    <!-- see the code -->
                                </ul>
                            </div>
                         </div>
                </div>
                </form>
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
                                Company name
                                </div>
                                <div class="time">
                                {{ date("d-m-Y", strtotime($vacancy->created_at)) }}
                                </div>
                            </div>
                        </div>
                        <div class="name">
                        <a type="button" href="{{ route('viewVacancy',$vacancy->id) }}">{{ $vacancy->title }}</a>
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
