@extends('layouts.profile')
@section('content')
  <div class="heading">
          Позиции
  </div>

  <div class="actions_vacancies">
    <div class="shown">
      <div class="section">
        <div class="col-lg-7 offset-lg-1">
          <h2>Edit Vacancy</h2>
        </div>

    @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Warning!</strong> Please check your fields.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

    <form action="{{ route('vacancies.update',$vacancy->id) }}" method="POST">
    @csrf
    @method('PUT')
      <div class="form-group">
        <label for="topic">Title</label>
        <input type="text" class="form-control" value="{{ $vacancy->title }}" placeholder="Enter Title" name ="title">
      </div>


        <div class="form-group">
            <label for="type_of_employment">Type of employment</label>
            <select type="text" name="type_of_employment_id" class="form-control">
                @foreach($type_of_employments as $type_of_employment)
                    <option value="{{$type_of_employment->id}}" @if($vacancy->type_of_employment_id == $type_of_employment->id) selected @endif>{{$type_of_employment->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="form_of_employment">Form of employment</label>
            <select type="text" name="form_of_employment_id" class="form-control">
                @foreach($form_of_employments as $form_of_employment)
                    <option value="{{$form_of_employment->id}}" @if($vacancy->form_of_employment_id == $form_of_employment->id) selected @endif>{{$form_of_employment->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="form_of_cooperation">Form of cooperation</label>
            <select type="text" name="form_of_cooperation_id" class="form-control">
                @foreach($form_of_cooperations as $form_of_cooperation)
                    <option value="{{$form_of_cooperation->id}}" @if($vacancy->form_of_cooperation_id == $form_of_cooperation->id) selected @endif>{{$form_of_cooperation->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <select type="text" name="city_id" class="form-control">
                @foreach($cities as $city)
                    <option value="{{$city->id}}" @if($vacancy->city_id == $city->id) selected @endif>{{$city->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="duration">Duration</label>
            <select type="text" name="duration_id" class="form-control">
                @foreach($durations as $duration)
                    <option value="{{$duration->id}}" @if($vacancy->duration_id == $duration->id) selected @endif>{{$duration->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="categories">Categories</label>
            <select class="form-select" multiple="multiple" name="categories[]">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($vacancy->category_id == $category->id) selected @endif>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" rows="3" name="description">{{ $vacancy->description }}</textarea>
      </div>
      <div class="pull-right btn">
                <a class="btn btn-orange" href="{{ route('vacancies.index') }}"> Back</a>
            </div>
      <button type="submit" class="btn btn-orange">Submit</button>
    </form>




      </div>

    </div>
  </div>


@stop
