@extends('layouts.profile')
@section('content')

                <div class="heading">
                Позиции
                </div>
                
                <div class="actions_vacancies">
                    <div class="shown">
                        <input type="hidden" value="PUT" name="_method" />
                        <div class="section">
                        <div class="col-lg-7 offset-lg-1">
                            <h2>Details Vacancy</h2>
                        </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Title:</strong>
                                        {{ $vacancy->title }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>City:</strong>
                                        {{ $vacancy->city }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Duration:</strong>
                                        {{ $vacancy->duration }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Type :</strong>
                                        {{ $vacancy->type_of_employment }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Form :</strong>
                                        {{ $vacancy->form_of_employment }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Description:</strong>
                                        {{ $vacancy->description }}
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                <div class="col-md-5 offset-lg-8">
                                <a class="btn btn-orange" href="{{ route('vacancies.index') }}"> {{ __('назад') }}</a>
                                </div>
                            </div>

                            </div>
                        </div>

                    </div>
                </div>
@stop