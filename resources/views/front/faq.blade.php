@extends('layouts.app')
@section('content')
    <section class="fix_intro faq_intro">
        <h1>FAQ</h1>
    </section>
    <section class="questions">
        <div class="container">
            <div class="item">
                <div class="question">
                    <span>Не могу сменить пароль</span>
                </div>
                <div class="answer">
                    В случае, если вы изменили специльность обучения в университете и нуждаетесь в смене направления для получения нужно практики, перейдите в личный профиль и отредактируйте нужную информацию. Рекомендации для поиска обновятся автоматически в течении нескольких минут.
                </div>
            </div>
            <div class="item">
                <div class="question">
                    <span>Можно ли изменить направление обучения?</span>
                </div>
                <div class="answer">
                    В случае, если вы изменили специльность обучения в университете и нуждаетесь в смене направления для получения нужно практики, перейдите в личный профиль и отредактируйте нужную информацию. Рекомендации для поиска обновятся автоматически в течении нескольких минут.
                </div>
            </div>
            <div class="item">
                <div class="question">
                    <span>Можно ли отменить заявку на практику?</span>
                </div>
                <div class="answer">
                    В случае, если вы изменили специльность обучения в университете и нуждаетесь в смене направления для получения нужно практики, перейдите в личный профиль и отредактируйте нужную информацию. Рекомендации для поиска обновятся автоматически в течении нескольких минут.
                </div>
            </div>
            <div class="item">
                <div class="question">
                    <span>Кто-то зашел в мой аккаунт</span>
                </div>
                <div class="answer">
                    В случае, если вы изменили специльность обучения в университете и нуждаетесь в смене направления для получения нужно практики, перейдите в личный профиль и отредактируйте нужную информацию. Рекомендации для поиска обновятся автоматически в течении нескольких минут.
                </div>
            </div>
        </div>
    </section>
    <section id="collaborate">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="/images/faq_form.png">
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <h2>Не нашли что искали?</h2>
                    <div class="sub">
                        Заполните форму ниже и мы обязательно свяжемся с вами в ближайшее время.
                    </div>
                    <form name="not_found" action="javascript:void(0)" method="post">
                        <input type="email" name="email" required="required" placeholder="E-mail" />
                        <textarea name="message" placeholder="Ваше сообщение"></textarea>
                        <button class="btn btn-orange" type="submit">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop