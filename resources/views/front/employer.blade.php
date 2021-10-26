@extends('layouts.app')
@section('content')
    <section class="howto_intro">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Инструкция работодателю</h1>
                    <div class="desc">
                        В нашей базе уже более 4000 резюме во всех возможных сферах. А главное - все их владельцы безумно заинтерисованы в сотрудничестве и так и ждут вашего приглашения на собеседование!
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="/images/employer.png">
                </div>
            </div>
        </div>
    </section>
    <section class="steps employ">
        <div class="container">
            <div class="col-lg-7">
                <div class="row no-gutters align-items-center">
                    <div class="number">
                        1
                    </div>
                    <div class="desc">
                        Всё просто — для начала определитесь, что вы можете дать практикантам
                    </div>
                </div>
            </div>
            <div class="col-lg-7 offset-lg-1">
                <div class="row no-gutters align-items-center">
                    <div class="number">
                        2
                    </div>
                    <div class="desc">
                        Зарегистрируйте аккаунт и заполните профиль компании. Так вас будут узнавать. Чем подобнее заполнен профиль, тем лучше!
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="row no-gutters align-items-center">
                    <div class="number">
                        3
                    </div>
                    <div class="desc">
                        Разместите обьявление об открытии вакансии стажера или практиканта. Старайтесь максимально подробно описать ёё, чтоб найти идеально подходящего кандидата.
                    </div>
                </div>
            </div>
            <div class="col-lg-7 offset-lg-1">
                <div class="row no-gutters align-items-center">
                    <div class="number">
                        4
                    </div>
                    <div class="desc">
                        Смотрите отклики в личном кабинете и выбирайте нужного Вам человека, а Practicum в этом поможет!
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ready">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="/images/ready_employ.png">
                </div>
                <div class="col-lg-6">
                    <h2>Готовы?</h2>
                    <div class="desc">
                        Для старта необходима регистрация аккаунта и вуаля, практиканты уже так и рвутся к вам в компанию!  Просто жмите кнопку ниже!
                    </div>
                    <a class="btn btn-orange" href="/register">
                        Регистрация
                    </a>
                </div>
            </div>
        </div>
    </section>
@stop