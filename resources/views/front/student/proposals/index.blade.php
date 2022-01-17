@extends('layouts.profileStudent')
@section('content')
  <div class="heading">
  Мои заявки
  </div>

  <div class="profile_employer">
    <div class="shown">
      <input type="hidden" value="PUT" name="_method" />
      @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
      @endif
      <div id="accordeon">
        <section class="questions">
          <div class="container">
            <div class="item">
              <div class="question">
                <span>Активные позиции</span>
              </div>
              <div class="answer">
                <div class="card">

                </div>
              </div>
            </div>
            <div class="item">
              <div class="question">
                <span>Собеседование</span>
              </div>
              <div class="answer">
                @foreach ($proposalsApprove as $proposal)
                  <div class="card">
                    <table class="table">
                      <tr>
                        <td>{{ date("d-m-Y", strtotime($proposal->created_at)) }}</td>
                        <td>{{ $proposal->vacancy->title}}</td>
                        <td>{{ $proposal->vacancy->description }}</td>
                        <td>
                          <form action="" method="POST">
                              @method('DELETE')
                              <button type="hidden" class="fa fa-times btn-orange btn-danger"></button>
                              @csrf
                          </form>
                        </td>
                      </tr>
                    </table>
                  </div>
                @endforeach
              </div>
            </div>
            <div class="item">
              <div class="question">
                <span>Активные заявки</span>
              </div>
              <div class="answer">
                @foreach ($proposalsAwait as $proposal)
                  <div class="card">
                    <table class="table">
                      <tr>
                        <td>{{ date("d-m-Y", strtotime($proposal->created_at)) }}</td>
                        <td>{{ $proposal->vacancy->title}}</td>
                        <td>{{ $proposal->vacancy->description }}</td>
                        <td>
                          <form action="" method="POST">
                              @method('DELETE')
                              <button type="hidden" class="fa fa-times btn-orange btn-danger"></button>
                              @csrf
                          </form>
                        </td>
                      </tr>
                    </table>
                  </div>
                @endforeach
              </div>
            </div>
            <div class="item">
              <div class="question">
                <span>Архив</span>
              </div>
              <div class="answer">
                <div class="card">
                  
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
@stop
