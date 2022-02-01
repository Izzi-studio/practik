@extends('layouts.app')
@section('content')
<section id="intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1>Направления</h1>
                    <div class="subtext">
                    Не знаешь, что конкретно хочешь найти? Выбери направление и ищи себя в нём!
                    </div>
                </div>
                <div class="col-lg-6 abs">
                    <img title="intro" alt="intro" src="/images/intro.png">
                </div>
                <div class="col-lg-12">
                <form action="{{ route('vacancies.search') }}" id="search" method="POST">
                @csrf
                        <input type="text" placeholder="Search categories" name="search" value="{{ request()->search ?? '' }}"/>
                        <button class="btn btn-orange">
                            <img src="/images/search.svg">
                        </button>
                </div>
            </div>
            <section class="cats">
                <div class="container">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                            <div class="row items">
                            @if ($categories->count())
                        @foreach ($categories as $category)
                                <div class="col-lg-4 item">
                                    <div class="image">
                                        <img src="/images/inter5.svg">
                                    </div>
                                    <div class="title">
                                    <a href="{{ route('vacancies.search') }}" value="{{ request()->categories ?? '' }}">{{$category->name}}</a>
                                    </div>
                                    <div class="num">
                                        <a href="#">890 вакансий</a>
                                    </div>
                                </div>
                                @endforeach   
                                    @endif
                            </div>
                </div>
            </section>
            </form>
        </div>
    </div>
</section>


@stop