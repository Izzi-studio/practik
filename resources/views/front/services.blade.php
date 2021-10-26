@extends('layouts.app')
@section('content')
    <section class="services_intro">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Наши услуги работодателю</h1>
                    <div class="desc">
                        Practicum — не просто платформа для поиска сотрудников а практикантов. Благодаря нам вы увеличите свои шансы получить действительно ценные кадры в кратчайшие сроки.
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="/images/services.png">
                </div>
            </div>
        </div>
    </section>
    <section class="tn">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2>Продвижение ваших вакансий</h2>
                    <div class="desc">
                        Напишите нам и мы договоримся об условиях, при которых ваши вакансии всегда будут в ТОП-е и привлеать больше внимания.
                    </div>
                    <a class="btn btn-orange" href="{{route('callback')}}">
                        Связаться с нами
                    </a>
                </div>
                <div class="col-lg-6">
                    <img src="/images/serv1.png">
                </div>
            </div>
        </div>
    </section>
    <section class="tn">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="/images/serv2.png">
                </div>
                <div class="col-lg-6">
                    <h2>Подбор кандидатов  из базы</h2>
                    <div class="desc">
                        Не хотите сами исследовать огромную базу кандидатов или мирно сидеть ждать, пока они сами напишут вам?  Мы поможем!
                    </div>
                    <a class="btn btn-orange" href="{{route('callback')}}">
                        Связаться с нами
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="tn">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2>Реклама</h2>
                    <div class="desc">
                        Напишите нам и мы договоримся об условиях, при которых ваши вакансии всегда будут в ТОП-е и привлекать больше внимания.
                    </div>
                    <a class="btn btn-orange" href="{{route('callback')}}">
                        Связаться с нами
                    </a>
                </div>
                <div class="col-lg-6">
                    <img src="/images/serv3.png">
                </div>
            </div>
        </div>
    </section>
@stop