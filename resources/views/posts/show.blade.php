@extends('layouts.profile')
@section('content')

                <div class="heading">
                Позиции
                </div>
                
                <div class="actions_vacancies">
                    <div class="shown">
                        <input type="hidden" value="PUT" name="_method" />
                        <div class="section">

                        <div class="row"> 
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <h2>Details Of The Vacancy</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Title:</strong>
                                        {{ $post->title }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>City:</strong>
                                        {{ $post->city }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Duration:</strong>
                                        {{ $post->duration }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Type :</strong>
                                        {{ $post->type_of_employment }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Form :</strong>
                                        {{ $post->form_of_employment }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Description:</strong>
                                        {{ $post->description }}
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                <div class="col-md-5 offset-lg-8">
                                <a class="btn btn-orange" href="{{ route('posts.index') }}"> {{ __('назад') }}</a>
                                </div>
                            </div>

                            </div>
                        </div>

                    </div>
                </div>
@stop