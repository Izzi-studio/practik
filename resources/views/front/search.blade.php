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
                <form action="{{ route('search') }}" role="search" method="GET" id="search">
                    @csrf
                        <input type="text" placeholder="Search vacancies" name="search" />
                        <button class="btn btn-orange">
                            <img src="/images/search.svg">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<section class="vacs">
        <div class="container">
            <div class="vacancies">
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
                                    {{ $vacancy->user->name }}
                                    </div>
                                    <div class="time">
                                    {{ date("d-m-Y", strtotime($vacancy->created_at)) }}
                                    </div>
                                </div>
                            </div>
                            <div class="name">
                            {{ $vacancy->title }}
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
                    @else
                        <div class="col-lg-4 item">
                            <div class="t_panel">
                                <div class="nt">
                                    <div class="title">
                                    <span class="text-danger">Results not found</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@stop