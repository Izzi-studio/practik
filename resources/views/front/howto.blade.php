@extends('layouts.app')
@section('content')
    <section class="howto_intro">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Как составить резюме</h1>
                    <div class="desc">
                        В нашей базе уже более 5000 вакансий во всех возможных сферах. А главное - все их владельцы
                        безумно заинтерисованы в сотрудничестве и так и ждут вашего отклика!
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="/images/howto.png">
                </div>
            </div>
        </div>
    </section>
    <section class="steps howto">
        <div class="container">
            <div class="col-lg-7 offset-lg-1">
                <div class="row no-gutters align-items-center">
                    <div class="number">
                        1
                    </div>
                    <div class="desc">
                        Всё просто — для начала определитесь, в какой сфере хотите найти практику.
                    </div>
                </div>
            </div>
            <div class="col-lg-7 offset-lg-2">
                <div class="row no-gutters align-items-center">
                    <div class="number">
                        2
                    </div>
                    <div class="desc">
                        Зарегистрируйте аккаунт и заполните профиль. Чем подобнее — тем лучше. Укажите свой опыт работы,
                        но не расстраивайтесь, если его нет. Practicum вам поможет)
                    </div>
                </div>
            </div>
            <div class="col-lg-7 offset-lg-1">
                <div class="row no-gutters align-items-center">
                    <div class="number">
                        3
                    </div>
                    <div class="desc">
                        Разместите своё резюме и отправлйтесь на поиски в раздел “вакансии”, либо же в конкретный
                        раздел.
                    </div>
                </div>
            </div>
            <div class="col-lg-7 offset-lg-2">
                <div class="row no-gutters align-items-center">
                    <div class="number">
                        4
                    </div>
                    <div class="desc">
                        Отправьте отклик и ждите. И пусть прибудет с вами удача.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ready">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="/images/ready.png">
                </div>
                <div class="col-lg-6">
                    <h2>Готовы?</h2>
                    <div class="desc">
                        Для старта необходима регистрация аккаунта и вуаля, практика мечты уже ждёт!
                    </div>
                    <a class="btn btn-orange" href="/register">
                        Регистрация
                    </a>
                </div>
            </div>
        </div>
    </section>
@stop