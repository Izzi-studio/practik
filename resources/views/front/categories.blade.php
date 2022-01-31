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

    <div id="cats">
            @if (request()->input('search'))
                <h6>{{ $categories->count() }} result(s) for the search "{{ request()->search }}"</h6>
            @endif
                <div class="categories">
                    <div class="row ">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="form-group">
                            <div class="tags">
                                <span class="grey">Популярное:</span>
                                <ul name="categories">
                                    @foreach ($mostPopularCategories as $category)
                                        <li><input @if(isset($requestData['categories'])  && in_array($category->category_id,$requestData['categories'])) checked @endif style="display: none" type="checkbox" id = "category-{{$category->category_id}}" name="categories[]" value="{{$category->category_id}}"/><label for="category-{{$category->category_id}}">{{$category->name}}</label></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @if ($categories->count())
                            @foreach ($categories as $category)
                            <div class="tags">
                                <div class="col-lg-4 col-md-2">
                                    <ul>
                                    <li><a href="{{ route('vacancies.search') }}" value="{{ request()->categories ?? '' }}">{{$category->name}}</a></li>       
                                </ul> 
                                
                                </div>  
                            </div>          
                            @endforeach   
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


@stop