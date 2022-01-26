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
                    @if (Session::has('message_sent'))
                        <div class="alert alert-success" >
                            {{Session::get('message_sent')}}
                        </div>
                    @endif
                    <form action="{{ route('contact.send') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <input type="text" name="name" placeholder="Name" />
                        <input type="text" name="phone" placeholder="Phone" />
                        <input type="email" name="email" placeholder="E-mail" />
                        <textarea name="message" placeholder="Ваше сообщение"></textarea>
                        <button class="btn btn-orange" type="submit">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop