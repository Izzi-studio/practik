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
                @foreach((array)json_decode(env('TYPE_OF_PRAKTIC')) as $id=>$name)
                    <option value="{{$id}}" @if($vacancy->type_of_employment == $id) selected @endif>{{$name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="form_of_employment">Form of employment</label>
            <select type="text" name="form_of_employment_id" class="form-control">
                @foreach((array)json_decode(env('FORM_OF_EMPLOYMENT')) as $id=>$name)
                    <option value="{{$id}}" @if($vacancy->form_of_employment == $id) selected @endif>{{$name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="form_of_employment">Form of cooperation</label>
            <select type="text" name="form_of_cooperation_id" class="form-control">
                @foreach((array)json_decode(env('FORM_OF_COOPERATION')) as $id=>$name)
                    <option value="{{$id}}" @if($vacancy->form_of_cooperation == $id) selected @endif>{{$name}}</option>
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
                @foreach((array)json_decode(env('DURATION')) as $id=>$name)
                    <option value="{{$id}}" @if($vacancy->duration == $id)  selected @endif>{{$name}}</option>
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
