@extends('layouts.profile')
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

        <form action="{{ route('posts.store') }}" method="POST">
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
                    <a class="btn btn-orange" href="{{ route('posts.index') }}">Back</a>
                </div>
        </form>
    </div>
  </div>
</div>
@stop