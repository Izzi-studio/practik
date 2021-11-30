@extends('layouts.profile')
@section('content')
  <div class="heading">
  Мои заявки
  </div>

  <div class="actions_vacancies">
    <div class="shown">
      <input type="hidden" value="PUT" name="_method" />
      <div id="accordeon">
        <div href="#item1" type="button" class="section_name" data-toggle="collapse" data-parent="#accordeon">Собеседования</div>
        <div class="collapse show" id="item1">
          <div class="card">
            @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
            @endif
            @foreach ($userVacancies as $userVacancy)
                <table class="table">
                  <tr>
                  <td>{{ date("d-m-Y", strtotime($userVacancy->created_at)) }}</td>
                    <td>
                    {{ $userVacancy->vacancy->title}}
                      </td>
                      
                    <td>
                      <a class="titre active" type="button" href="{{ route('proposals.show',$userVacancy->id) }}">{{ $userVacancy->user->last_name }} {{ $userVacancy->user->first_name }}</a>
                    </td>
                    <td>
                      <form action="{{ route('proposals.destroy',$userVacancy->id) }}" method="POST">
                        @method('DELETE')
                          <button type="hidden" class="fa fa-times btn-orange btn-danger"></button>
                          @csrf
                      </form>
                          <a class="btn-orange btn-primary fa fa-check" href="{{ route('proposals.edit',$userVacancy->id) }}"></a>

                    </td>
                  </tr>
                </table>
            @endforeach
          </div>
        </div>
        
        <div href="#item2" type="button" class="section_name" data-toggle="collapse" data-parent="#accordeon">Ожидают рассмотрения</div>
        <div class="collapse" id="item2">
          <div class="card">
          </div>
        </div>


        <div href="#item3" type="button" class="section_name" data-toggle="collapse" data-parent="#accordeon">Архив</div>
        <div class="collapse" id="item3">
          <div class="card">
            @foreach ($archiveCandidates as $userVacancy)
              <div class="test">
                <table class="card-body table">
                  <tr>
                    <td>{{ date("d-m-Y", strtotime($userVacancy->updated_at)) }}</td>
                    <td class="titre">{{ $userVacancy->vacancy->title }}</td>
                    <td></td>
                    <td>
                      @if ($userVacancy->status === '3')
                        <div class="fa-2x fas fa-check check"></div>
                        <div class="archiveName">Найден</div>
                        @csrf
                      @else
                        <div class="fa-2x fas fa-times cross"></div>
                        <div class="deleteName" >Удалена</div>
                        @csrf
                      @endif
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