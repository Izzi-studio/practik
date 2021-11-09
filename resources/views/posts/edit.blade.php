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
                <h2>Edit Vacancy</h2>
            </div>
        </div>
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

    <form action="{{ route('posts.update',$post->id) }}" method="POST">
    @csrf
    @method('PUT')
      <div class="form-group">
        <label for="topic">Title</label>
        <input type="text" class="form-control" value="{{ $post->title }}" placeholder="Enter Title" name ="title">
      </div>
      <div class="form-group">
        <label for="type_of_employment">Type</label>
        <input type="text" class="form-control" value="{{ $post->type_of_employment }}" placeholder="Enter Type" name ="type_of_employment">
      </div>
      <div class="form-group">
        <label for="form_of_employment">Duration</label>
        <input type="text" class="form-control" value="{{ $post->form_of_employment }}" placeholder="Enter Form" name ="form_of_employment">
      </div>
      <div class="form-group">
        <label for="city">City</label>
        <input type="text" class="form-control" value="{{ $post->city }}" placeholder="Enter City" name ="city">
      </div>
      <div class="form-group">
        <label for="duration">Duration</label>
        <input type="text" class="form-control" value="{{ $post->duration }}" placeholder="Enter Duration" name ="duration">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" rows="3" name="description">{{ $post->description }}</textarea>
      </div>
      <div class="pull-right btn">
                <a class="btn btn-orange" href="{{ route('posts.index') }}"> Back</a>
            </div>
      <button type="submit" class="btn btn-orange">Submit</button>
    </form>




      </div>

    </div>
  </div>


@stop