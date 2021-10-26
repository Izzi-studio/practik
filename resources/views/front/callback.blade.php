@extends('layouts.app')
@section('content')
    <section id="collaborate">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="/images/faq_form.png">
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <h2>Появились вопросы?</h2>
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