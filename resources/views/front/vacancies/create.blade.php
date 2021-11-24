@extends('layouts.app')
    @section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.0/js/select2.min.js"></scrip>
    @endsection
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
            <input type="text" class="form-control"  placeholder="Enter Title" name ="title" value="{{old('title')}}">
          </div>
          <div class="form-group">
            <label for="type_of_employment">Type of employment</label>
              <select type="text" name="type_of_employment_id" class="form-control">
              @foreach($type_of_employments as $type_of_employment)
                  <option value="{{ $type_of_employment->id, old('type_of_employments') ? 'selected' : ''}}">{{$type_of_employment->name}}</option>
              @endforeach
              </select>
          </div>
          <div class="form-group">
            <label for="form_of_cooperation">Form of cooperation</label>
              <select type="text" name="form_of_cooperation_id" class="form-control">
              @foreach($form_of_cooperations as $form_of_cooperation)
                  <option value="{{ $form_of_cooperation->id, old('form_of_cooperations') ? 'selected' : ''}}">{{$form_of_cooperation->name}}</option>
              @endforeach
              </select>
          </div>

            <div class="form-group">
            <label for="form_of_employment">Form of employment</label>
              <select type="text" name="form_of_employment_id" class="form-control">
              @foreach($form_of_employments as $form_of_employment)
                  <option value="{{ $form_of_employment->id, old('form_of_employments') ? 'selected' : ''}}">{{$form_of_employment->name}}</option>
              @endforeach
              </select>
          </div>
          <div class="form-group">
            <label for="city">City</label>
              <select type="text" name="city_id" class="form-control">
              @foreach($cities as $city)
                  <option value="{{ $city->id, old('cities') ? 'selected' : ''}}">{{ $city->name}}</option>
              @endforeach
              </select>
          </div>
          <div class="form-group">
            <label for="duration">Duration</label>
              <select type="text" name="duration_id" class="form-control">
              @foreach($durations as $duration)
                  <option value="{{ $duration->id, old('durations') ? 'selected' : ''}}">{{$duration->name}}</option>
              @endforeach
              </select>
          </div>
          <div class="form-group">
            <label for="categories">Categories : </label>
            <select class="form-select" multiple name="categories[]">
					@foreach($categories as $category)
						<option value="{{ $category->id, old('categories') ? 'selected' : ''}}">{{ $category->name }}</option>
					@endforeach

				</select>
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


@endsection
@section('styles')
    <script>
    $(document).ready(function() {
    $('.select2-multi').select2();
});
</script>
@endsection