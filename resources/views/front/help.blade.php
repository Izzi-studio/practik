@extends('layouts.profileStudent')
@section('content')
<div class="heading">
Помощь
</div>

<div class="profile_employer">
    <div class="shown">
      <input type="hidden" value="PUT" name="_method" />
      @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
      @endif
      <div id="accordeon">
        <section class="questions">
          <div class="container">
            <div class="item">
              <div class="question">
                <span>Не могу сменить пароль</span>
              </div>
              <div class="answer">
              Заполните контактную форму, и мы постараемся решить проблему вместе.
              </div>
            </div>
            <div class="item">
              <div class="question">
                <span>Можно ли отменить заявку на практику?</span>
              </div>
              <div class="answer">
              Для того чтобы отменить регистрацию практики,
              должна быть уважительная причина.
              Это зависит от конкретной ситуации.
              Отправьте нам свою ситуацию, заполнив следующую форму. 
              </div>
            </div>
            <div class="item">
              <div class="question">
                <span>Кто-то зашел в мой аккаунт</span>
              </div>
              <div class="answer">
              Если вы уверены в мошенничестве, зайдите в свой профиль и удалите свой аккаунт.
              Вам придется снова создать учетную запись. К сожалению, других решений нет.
              </div>
            </div>
            <div class="item">
              <div class="question">
                <span>Как мне узнать, что работодатель посмотрел заявку?</span>
              </div>
              <div class="answer">
              Статус вашей заявки можно посмотреть в вашем профиле на вкладке "предложения".
              </div>
            </div>
            <div class="item">
              <div class="question">
                <span>Можно ли изменить направление обучения?</span>
              </div>
              <div class="answer">
              В случае, если вы изменили специльность обучения в университете и нуждаетесь в смене направления для получения нужно практики,
              перейдите в личный профиль и отредактируйте нужную информацию.
              Рекомендации для поиска обновятся автоматически в течении нескольких минут.
              </div>
            </div>
          </div>
      </div>

            <div class="row align-items-center" id="collaborate">
                <div class="col-lg-8 offset-lg-1">
                    <h2>Не нашли что искали?</h2>
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
                        <input type="text" name="name" placeholder="Имя" />
                        <input type="text" name="phone" placeholder="Телефон" />
                        <input type="email" name="email" placeholder="Электронная почта" />
                        <textarea name="message" placeholder="Опишите свою проблему"></textarea>
                        <button class="btn btn-orange" type="submit">Отправить</button>
                    </form>
                </div>
            </div>
    </section>
    </div>
  </div>

@stop