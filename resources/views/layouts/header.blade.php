<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/chosen.jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/functions.js') }}" defer></script>
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
    <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
    </script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <script src="https://kit.fontawesome.com/e9b6921b84.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chosen.min.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<header>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 logo">
                <a href="/">
                    <img src="/images/logo.svg">
                </a>
            </div>
            <div class="col-lg-5">
                <div class="topmenu">
                    <ul>
                        <li>
                            <a href="{{route('welcome')}}">Вакансии</a>
                        </li>
                        <li>
                            <a href="{{route('companies')}}">Компании</a>
                        </li>
                        <li>
                            <a href="">Разместить резюме</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 text-right">
                @guest
                    <a class="workgiver" href="{{route('employer')}}">
                        Работодателю
                    </a>
                    <a class="workgiver" href="{{route('register')}}">
                        Регистрация
                    </a>
                    <a class="btn btn-default" href="{{route('login')}}">
                        Войти
                    </a>
                @endguest
                @auth
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="workgiver" href="{{route('profile_view')}}">Профиль</a>
                    <a class="btn btn-default" href="{{route('logout')}}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                @endauth
            </div>
        </div>
    </div>
</header>