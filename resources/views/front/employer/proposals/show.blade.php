@extends('layouts.profileEmployer')
@section('content')
  <div class="heading">
  резюме студента
  </div>
  <div class="resume_student">
    <div class="shown">
      <embed src="{{ asset('upload/' .$proposal->cv ) }}" width="700" height="850" alt="pdf" />
      <div class="pull-right btn">
        <a href="{{ route('export-pdf') }}" class="btn btn-orange">Download</a>
      </div>
      <div class="pull-right btn">
        <a class="btn btn-orange" href="{{ route('proposals.index') }}">Back</a>
      </div>
    </div>
  </div>
@stop
