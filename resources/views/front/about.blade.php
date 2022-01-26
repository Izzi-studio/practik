@extends('layouts.app')
@section('content')
    <section id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Practicum — <br/>о нас</h1>
                    <div class="desc">
                        Мы — гуру поиска вакансий, стажировок и практик для студентов. С радостью предоставляем
                        студентам быстрый путь к крутой карьере, а работодателям находим свежие и бесподобные умы.
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="/images/about.png">
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
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 desc">
                    “Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit amet consectetur adipisci[ng] velit, sed quia non numquam [do] eius modi tempora inci[di]dunt, ut labore et dolore magnam aliquam quaerat voluptatem.
                </div>
                <div class="col-lg-7 offset-lg-4 desc">
                    “Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit amet consectetur adipisci[ng] velit, sed quia non numquam [do] eius modi tempora inci[di]dunt, ut labore et dolore magnam aliquam quaerat voluptatem.
                </div>
            </div>
        </div>
    </section>
    <section id="collaborate">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="/images/collaborate.png">
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <h2>Хотите сотрудничать?</h2>
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