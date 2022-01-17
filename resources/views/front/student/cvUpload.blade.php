@extends('layouts.app')
@section('content')

<section id="intro">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1>Submit your resume</h1>
                <div class="subtext">
                Don't hesitate to submit your resume so that employers have more information about you.
                Put all the chances on your side !!
                </div>
            </div>
            <div class="col-lg-6 abs">
                <img title="intro" alt="intro" src="/images/intro.png">
            </div>
            <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    @if (count($errors) > 0)
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }} </div>
                        @endforeach 
                    @endif
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success  alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>  
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form action="{{ route('file.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Choose File</label>
                            <input type="file" name="cv" class="form-control">
                        </div>
                        <div class="form-group" class="text-center">
                            <button class="btn btn-orange">Save</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop