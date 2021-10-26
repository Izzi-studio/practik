<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="logo">
                    <a href="#">
                        <img src="/images/logo.svg">
                    </a>
                </div>
                <div class="desc">
                    Practicum – сервис поиска программ практик/стажировок для студентов ВУЗов
                </div>
                <div class="social">
                    <a href="#">
                        <img src="/images/instagram.svg">
                    </a>
                    <a href="#">
                        <img src="/images/fb.svg">
                    </a>
                    <a href="#">
                        <img src="/images/twitter.svg">
                    </a>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1 footmenu">
               <div class="heading">
                   Соискателю
               </div>
                <ul>
                    <li><a href="#">Поиск вакансий</a></li>
                    <li><a href="#">Разместить резюме</a></li>
                    <li><a href="{{route('howto')}}">Как составить резюме</a></li>
                </ul>
            </div>
            <div class="col-lg-2 footmenu">
                <div class="heading">
                    Работодателю
                </div>
                <ul>
                    <li><a href="#">Поиск резюме</a></li>
                    <li><a href="#">Добавить вакансию</a></li>
                    <li><a href="{{route('services')}}">Наши услуги</a></li>
                </ul>
            </div>
            <div class="col-lg-2 footmenu">
                <div class="heading">
                    О нас
                </div>
                <ul>
                    <li><a href="{{route('about')}}">О сервисе</a></li>
                    <li><a href="{{route('faq')}}">FAQ</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <div class="heading">
                    Остались вопросы?
                </div>
                <a class="btn btn-default" href="{{route('callback')}}">
                    Связаться с нами
                </a>
            </div>
        </div>
        <div class="row copy">
            <div class="col-lg-5 copyright">
                © 2020 Practicum
            </div>
            <div class="col-lg-7 text-right">
                <ul>
                    <li><a href="#">Помощь</a></li>
                    <li><a href="#">Условия и положения</a></li>
                    <li><a href="#">Политика безопасности</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>
</html>