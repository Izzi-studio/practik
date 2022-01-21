@extends('layouts.app')
@section('content')
<section class="fix_intro faq_intro">
        <h1>Компании</h1>
</section>
<section>
<div class="container">
      <div class="">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <br>
        <table class="company table table-bordered">
          <thead>
            <tr class="">
              <th>Company name</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody id="myTable">            
            @foreach ($companies as $company)
          <form class="form-control" action="{{ route('vacancies.search') }}" id="search" method="POST">
            @csrf
              <tr>
                <td><button class="btn btn-light" type="submit" value="{{ request()->search ?? '' }}">{{json_decode($company->additional_info)->company}}</button></td>
                <td>{{ $company->email }}</td>
              </tr>
            @endforeach              
          </form>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@stop