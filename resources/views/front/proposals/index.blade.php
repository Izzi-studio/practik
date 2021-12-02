@extends('layouts.profile')
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
        <div href="#item1" type="button" class="section_name" data-toggle="collapse" data-parent="#accordeon">Собеседования</div>
        <div class="collapse" id="item1">
          <div class="card">
            @foreach ($proposalsApprove as $proposal)
                <table class="table">
                  <tr>
                  <td>{{ date("d-m-Y", strtotime($proposal->created_at)) }}</td>
                    <td>
                    {{ $proposal->vacancy->title}}
                      </td>

                    <td>
                      <a class="titre active" type="button" href="{{ route('proposals.show',$proposal->id) }}">{{ $proposal->user->last_name }} {{ $proposal->user->first_name }}</a>
                    </td>
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

        <div href="#item2" type="button" class="section_name" data-toggle="collapse" data-parent="#accordeon">Ожидают рассмотрения</div>
        <div class="collapse show" id="item2">
        @foreach ($proposalsAwait as $proposal)
          <div class="card">
                  <table class="table">
                      <tr>
                          <td>{{ date("d-m-Y", strtotime($proposal->created_at)) }}</td>
                          <td>
                              {{ $proposal->vacancy->title}}
                          </td>

                          <td>
                              <a class="titre active" type="button" href="{{ route('proposals.show',$proposal->id) }}">{{ $proposal->user->last_name }} {{ $proposal->user->first_name }}</a>
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
              
          </div>@endforeach
        </div>


        <div href="#item3" type="button" class="section_name" data-toggle="collapse" data-parent="#accordeon">Архив</div>
        <div class="collapse" id="item3">
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
                    <td class="titre">{{ $proposal->vacancy->title }}</td>
                    <td>{{ $proposal->user->last_name }} {{ $proposal->user->first_name }}</td>
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
  </div>
@stop
