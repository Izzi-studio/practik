@extends('layouts.app')
@section('content')
<div class="heading">
          Позиции
  </div>
  <div class="actions_vacancies">
    <div class="shown">
      <div class="section">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add New Vacancy</h2>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Warning!</strong> Please check your fields<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-lg-6">
        <form action="{{ route('vacancies.store') }}" method="POST">
        @csrf
          <div class="form-group">
            <label for="title">Vacancy title</label>
            <input type="text" class="form-control"  placeholder="Enter Title" name ="title">
          </div>
          <div class="form-group">
            <label for="type_of_employment">Type of employment</label>
            <input type="text" class="form-control"  placeholder="Enter Type" name ="type_of_employment">
          </div>
          <div class="form-group">
            <label for="form_of_employment">Form of employment</label>
            <input type="text" class="form-control"  placeholder="Enter Form" name ="form_of_employment">
          </div>
          <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control"  placeholder="Enter City" name ="city">
          </div>
          <div class="form-group">
            <label for="duration">Duration</label>
            <input type="text" class="form-control"  placeholder="Enter Date" name ="duration">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" rows="3"placeholer ="Enter description" name="description"></textarea>
          </div>
          <button type="submit" class="btn btn-orange">Submit</button>
          <div class="pull-right btn">
                    <a class="btn btn-orange" href="{{ route('vacancies.index') }}">Back</a>
                </div>
        </form>
</div>

       
    </div>
  </div>
</div>
@stop

<!--                        <input type="text" name="name"/>
                        <input type="text" name="country_id"/>
                        <input type="text" name="city_id"/>
                        <input type="text" name="region_id"/>
                        <select type="text" name="form_of_employment">
                            @foreach((array)json_decode(env('FORM_OF_EMPLOYMENT')) as $id=>$name)
                                <option value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                        <select type="text" name="type_of_praktic">
                            @foreach((array)json_decode(env('TYPE_OF_PRAKTIC')) as $id=>$name)
                                <option value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>

                        <select type="text" name="duration_time">
                            @foreach((array)json_decode(env('DURATION')) as $id=>$name)
                                <option value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                        <select type="text" name="form_of_cooperation">
                            @foreach((array)json_decode(env('FORM_OF_COOPERATION')) as $id=>$name)
                                <option value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                        <textarea name="description"></textarea>
                        <input type="submit"/> -->