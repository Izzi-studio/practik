@extends('layouts.profileEmployer')
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
                <span>Собеседования</span>
              </div>
              <div class="answer">
                <div class="card">
                  @foreach ($proposalsApprove as $proposal)
                    <table class="table">
                      <tr>
                        <td>{{ date("d-m-Y", strtotime($proposal->created_at)) }}</td>
                        <td>{{ $proposal->vacancy->title}}</td>
                        <td><a type="button" class="titre active" data-toggle="modal" data-target="#modelId">{{ $proposal->user->last_name }} {{ $proposal->user->first_name }}</a></td>
                        <td>
                          <form action="{{ route('proposals.destroy',$proposal->id) }}" method="POST">
                            @method('DELETE')
                            <button type="hidden" class="fa fa-times btn-orange btn-danger"></button>
                            @csrf
                          </form>
                          <a class="btn-orange btn-primary fa fa-check" href="{{ route('proposals.accepted',$proposal->id) }}"></a>
                        </td>
                      </tr>
                    </table>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="item">
              <div class="question">
                <span>Ожидают рассмотрения</span>
              </div>
              <div class="answer">
                @foreach ($proposalsAwait as $proposal)
                  <div class="card">
                    <table class="table">
                      <tr>
                        <td>{{ date("d-m-Y", strtotime($proposal->created_at)) }}</td>
                        <td>{{ $proposal->vacancy->title}}</td>
                        <td>
                            <a class="titre active" type="button" href="{{ route('proposal.show',$proposal->id) }}">{{  $proposal->user->last_name }}{{  $proposal->user->first_name }}</a>
                          </td>
                        <td>
                          <form action="{{ route('proposals.destroy',$proposal->id) }}" method="POST">
                            @method('DELETE')
                            <button type="hidden" class="fa fa-times btn-orange btn-danger"></button>
                            @csrf
                          </form>
                          <a class="btn-orange btn-primary fa fa-check" href="{{ route('proposals.approved',$proposal->id) }}"></a>
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
                  @foreach ($proposalsArchive as $proposal)
                    <div class="test">
                      <table class="card-body table">
                        <tr>
                          <td>{{ date("d-m-Y", strtotime($proposal->updated_at)) }}</td>
                          <td class="titre">{{ $proposal->vacancy->title }}</td>
                          <td>{{ $proposal->user->last_name }} {{ $proposal->user->first_name }}</td>
                          <td>
                              <div class="fa-2x fas fa-times cross"></div>
                              <div class="deleteName" >Отказ</div>
                          </td>
                        </tr>
                      </table>
                    </div>
                  @endforeach
                  @foreach ($proposalsAccept as $proposal)
                    <div class="test">
                      <table class="card-body table">
                        <tr>
                          <td>{{ date("d-m-Y", strtotime($proposal->updated_at)) }}</td>
                          <td>{{ $proposal->vacancy->title }}</td>
                          <td class="titre">{{ $proposal->user->last_name }} {{ $proposal->user->first_name }}</td>
                          <td>
                              <div class="fa-2x fas fa-check check"></div>
                              <div class="archiveName">Принято</div>
                          </td>
                        </tr>
                      </table>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
@stop
