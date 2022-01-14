@extends('layouts.profileEmployer')
@section('content')
  <div class="heading">
    Cv студента
  </div>
  <div class="resume_student">
    <div class="shown">
      <button type="button" class="btn btn-orange" data-toggle="modal" data-target="#modelId">
        Preview Resume
      </button>
      <div class="modal fade " id="modelId" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Preview Resume</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                  <iframe width='100%' height='900'  src="{{route('proposal.resume',$proposal->id) }}"></iframe>
              </div>
            </div>
              <div class="modal-footer">
                <div class="pull-right btn">
                  <a class="btn btn-orange" href="{{route('resume.download',$proposal->id)}}" role="button">Download</a>
                </div>
                 <button type="button" class="btn btn-orange" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
  

      <div class="section">
        <div class="col-lg-7 offset-lg-1">
          <h2>{{ $proposal->user->last_name }} {{ $proposal->user->first_name }}</h2>
        </div>
        <ol class="list-group list-group-numbered">
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div><strong>Email :</strong></div>
            {{ $proposal->user ? $proposal->user->email : "No information available" }}
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div><strong>Phone :</strong></div>
            
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div><strong>Country :</strong></div>
            
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div><strong>City :</strong></div>
            
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div><strong>Univeristy :</strong></div>
            
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div><strong>Experience :</strong></div>
            
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div><strong>Hobby :</strong></div>
            
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div><strong>Languages :</strong></div>
            
            </div>
          </li>
        </ol>      
        <div class="col-md-5 offset-lg-8">
            <a class="btn btn-orange" href="{{ route('proposals.index') }}"> {{ __('назад') }}</a>
        </div>
      </div>
    </div>
  </div>
@stop