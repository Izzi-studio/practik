@extends('layouts.profile')
@section('content')

    <div class="heading">
    Позиции
    </div>
                
    <div class="profile_employer">
        <div class="shown">
            <input type="hidden" value="PUT" name="_method" />
            <div class="section">
            <div class="col-lg-7 offset-lg-1">
                <h2>{{ $vacancy->title }}</h2>
            </div>
            <ol class="list-group list-group-numbered">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                    <div><strong>Categories :</strong></div>
                        @foreach ($vacancy->categories as $category )
                            <span> {{ $category->name}}</span>
                        @endforeach
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                    <div><strong>City :</strong></div>
                    {{ $vacancy->city ? $vacancy->city->name : "Field not filled" }}
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                    <div><strong>Type of employment :</strong></div>
                    {{ $vacancy->typeOfEmployment ? $vacancy->typeOfEmployment->name : "Field not filled" }}
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                    <div><strong>Form of employment :</strong></div>
                    {{ $vacancy->formOfEmployment ? $vacancy->formOfEmployment->name : "Field not filled" }}
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                    <div><strong>Form of cooperation :</strong></div>
                    {{ $vacancy->formOfCooperation ? $vacancy->formOfCooperation->name : "Field not filled" }}
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                    <div><strong>Duration :</strong></div>
                    {{ $vacancy->duration ? $vacancy->duration->name : "Field not filled" }}
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                    <div><strong>Description :</strong></div>
                    {{ $vacancy->description }}
                    </div>
                </li>
            </ol>      
                <div class="col-md-5 offset-lg-8">
                    <a class="btn btn-orange" href="{{ route('vacancies.index') }}"> {{ __('назад') }}</a>
                </div>
        </div>
    </div>
</div>
@stop