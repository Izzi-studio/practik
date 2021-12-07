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
                <form action="{{ route('categories') }}" role="search" method="GET" id="search">
                    @csrf
                        <input type="text" placeholder="Search vacancies" name="search" value="{{ request()->search ?? '' }}"/>
                        <button class="btn btn-orange">
                            <img src="/images/search.svg">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="cats">
        <div class="container">
        @if (request()->input('search'))
                <h6>{{ $allCategories->count() }} result(s) for the search "{{ request()->search }}"</h6>
                @endif
            <div class="categories">
                <div class="row ">
                    <div class="row ">
                        @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                        @if ($allCategories->count())
                        @foreach ($allCategories as $category)
                            <div class="col-lg-2 item">
                                <div class="t_panel">
                                    <div class="image">
                                        <img src="/images/companies/p_morris.svg">
                                    </div>
                                </div>
                                <div class="name">
                                {{ $category->name}}       
                                </div>
                                <p>{{ $category->vacancies->count()}} Практика</p>
                            </div>            
                        @endforeach   
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop