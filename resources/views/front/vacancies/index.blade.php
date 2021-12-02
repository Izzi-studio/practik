@extends('layouts.profile')
@section('content')
  <div class="heading">
  Позиции
  </div>

  <div class="profile_employer">
    <div class="shown">
      <input type="hidden" value="PUT" name="_method" />
      <div class="section">
        <div class="form-group row">
          <div class="offset-lg-1">
            <a class="btn btn-orange" href="{{ route('vacancies.create') }}">{{ __('Добавить позицию') }}</a>
          </div>
        </div>
      </div>
      <div id="accordeon">
        <div href="#item1" type="button" class="section_name" data-toggle="collapse" data-parent="#accordeon">Активные позиции</div>
        <div class="collapse show" id="item1">
          <div class="card">
            @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
            @endif
            @foreach ($vacancies as $vacancy)
                <table class="table">
                  <tr>
                    <td>{{ date("d-m-Y", strtotime($vacancy->created_at)) }}</td>
                    <td>
                      <a class="titre active" type="button" href="{{ route('vacancies.show',$vacancy->id) }}">{{ $vacancy->title }}</a>
                    </td>
                    <td>
                      <a class="btn btn-light" type="button" href="{{ route('proposals.index',$vacancy->id) }}">{{ $vacancy->candidates->count()}} responses</a>
                    </td>
                    <td>
                      <form action="{{ route('vacancies.destroy',$vacancy->id) }}" method="POST">
                        @method('DELETE')
                          <button type="submit" class="far fa-trash-alt btn-orange btn-danger"></button>
                          <a class="btn-orange btn-primary far fa-edit" href="{{ route('vacancies.edit',$vacancy->id) }}"></a>
                        @csrf
                      </form>
                    </td>
                  </tr>
                </table>
            @endforeach
          </div>
        </div>
        
        <div href="#item2" type="button" class="section_name" data-toggle="collapse" data-parent="#accordeon">Архив</div>
        <div class="collapse" id="item2">
          <div class="card">
            @foreach ($archiveVacancies as $vacancy)
              <div class="test">
                <table class="card-body table">
                  <tr>
                    <td>{{ date("d-m-Y", strtotime($vacancy->updated_at)) }}</td>
                    <td class="titre">{{ $vacancy->title }}</td>
                    <td>{{ $vacancy->description }}</td>
                    <td>
                      @if ($vacancy->status === '2')
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
