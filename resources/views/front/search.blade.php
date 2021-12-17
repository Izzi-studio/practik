@extends('layouts.app')

@section('content')
<section id="intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1>List of vacancies</h1>
                    <div class="subtext">
                    The search bar is made to help you, don't hesitate to use it !!
                    </div>
                </div>
                <div class="col-lg-6 abs">
                    <img title="intro" alt="intro" src="/images/intro.png">
                </div>
                <div class="col-lg-12">
                <form action="{{ route('vacancies.search') }}" role="search" method="POST" id="search" name="search_vacancy">
                    @csrf
                        <input type="text" placeholder="Search vacancies" name="search" value="{{ request()->search ?? '' }}" />
                        <button type="submit" class="btn btn-orange">
                            <img src="/images/search.svg">
                        </button>
                        <div class="tags">
                            <!-- see the code -->
                        <ul name="categories">
                            @if ($mostPopularCategories->count())
                                @foreach ($mostPopularCategories as $category)
                                    <li><input @if(isset($requestData['categories'])  && in_array($category->category_id,$requestData['categories'])) checked @endif style="display: none" type="checkbox" id = "category-{{$category->category_id}}" name="categories[]" value="{{$category->category_id}}"/><label for="category-{{$category->category_id}}">{{$category->name}}</label></li>
                                @endforeach
                            @endif
                        </ul>
                            <!-- see the code -->
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<section class="vacs">
        <div class="container">
            <div class="vacancies">
                @if (request()->input('search'))
                <h6>{{ $allVacancies->count() }} result(s) for the search "{{ request()->search }}"</h6>
                @endif
                <div class="row ">
                    @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                    @if ($allVacancies->count())
                        @foreach ($allVacancies as $vacancy)
                        <div class="col-lg-4 item">
                            <div class="t_panel">
                                <div class="image">
                                    <img src="/images/companies/p_morris.svg">
                                </div>
                                <div class="nt">
                                    <div class="title">
                                    {{$additional_info['company']}}
                                    </div>
                                    <div class="time">
                                    {{ date("d-m-Y", strtotime($vacancy->created_at)) }}
                                    </div>
                                </div>
                            </div>
                            <div class="name">
                            <a type="button" href="{{ route('viewVacancy',$vacancy->id) }}">{{ $vacancy->title }}</a>
                            </div>
                            <div class="tags">
                                <span>Практика</span>
                                <span>
                                {{ $vacancy->city ? $vacancy->city->name : "Field not filled" }}
                                </span>
                            </div>
                            <div class="cat">
                                <a href="#">
                                    Менеджмент
                                </a>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@stop
