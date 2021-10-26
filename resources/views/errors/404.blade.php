@extends('layouts.app')
@section('content')
    <section id="not_found">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="err_code">
                        404
                    </div>
                    <div class="err_text">
                        Тут ничего нет :(
                    </div>
                    <a class="btn btn-orange" href="/">
                        Вернуться на главную
                    </a>
                </div>
                <div class="col-lg-8">
                    <img src="/images/404.png">
                </div>
            </div>
        </div>
    </section>
@stop