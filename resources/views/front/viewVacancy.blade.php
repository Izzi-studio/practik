@extends('layouts.app')

@section('content')
<!-- <section id="intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1>List of vacancies</h1>
                </div>
                <div class="col-lg-12">
                <form action="{{ route('vacancies.search') }}" role="search" method="GET" id="search">
                        <button type="submit" class="btn btn-orange">
                            postuler
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section> -->
<section class="viewVac">
    <div class="container">
        @if ($message = Session::get('error'))
            <p class="alert alert-warning">{{ $message }}</p>
        @endif
        @if ($message = Session::get('success'))
            <p class="alert alert-success">{{ $message }}</p>
        @endif
        <h2>{{ $vacancy->title }}</h2>
        <div class="vacancy">
            <div class="col-lg-12 item">
                <div class="t_panel">
                    <div class="image">
                        <img src="/images/companies/p_morris.svg">
                    </div>
                    <div class="nt">
                        <div class="title">
                        Company name
                        </div>                                   
                        <div class="time">
                            {{ date("d-m-Y", strtotime($vacancy->created_at)) }}
                        </div>
                        <div class="tags">
                            <span>
                                {{ $vacancy->city ? $vacancy->city->name : "Field not filled" }}
                            </span>
                            <span>
                                {{ $vacancy->typeOfEmployment ? $vacancy->typeOfEmployment->name : "Field not filled" }}
                            </span>
                            <span>
                                {{ $vacancy->formOfEmployment ? $vacancy->formOfEmployment->name : "Field not filled" }}
                            </span>
                        </div>
                        <div class="cat">
                            <a >
                                Менеджмент
                            </a>
                        </div>
                        <div class="duration">
                            <span>Практика</span>
                            <span>
                                : {{ $vacancy->duration ? $vacancy->duration->name : "Field not filled" }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div class="name" >
                Описание
            </div>
            <div class="" >
                {{ $vacancy->description }}
            </div>
            <div class="name" >
                Контакты
            </div>
            <div class="" >
                <p>До приглашения не собеседование вы не можете видеть контакты даной компании.</p>
            </div>
        </div>
        <form action="{{ route('applyVacancy', $vacancy->id) }}" method="POST">
        @csrf
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-8">
                    <button type="submit" class="btn btn-orange">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>
@stop