@extends('layouts.profile')
@section('content')
  <div class="heading">
  Позиции
  </div>

  <div class="actions_vacancies">
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
          <div class="card-body">
            @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
            @endif
            @foreach ($vacancies as $vacancy)
              <div class="card">
                  <table class="table">
                    <tr>
                      <td>{{ date("d-m-Y", strtotime($vacancy->created_at)) }}</td>
                      <td class="titre">{{ $vacancy->title }}</td>
                      <td>
                        <button type="button" class="btn btn-light">Contact</button>
                        <p>
                            <a href="{{ route('vacancies.proposals', $vacancy->id)}}">{{ $vacancy->candidates->count()}} responses</a>
                          </p>
                      </td>
                      <td>
                        <form action="{{ route('vacancies.destroy',$vacancy->id) }}" method="POST">
                          @method('DELETE')
                            <button type="submit" class="far fa-trash-alt btn-orange btn-danger"></button>
                            <a class="btn-orange btn-primary far fa-edit" href="{{ route('vacancies.edit',$vacancy->id) }}"></a>
                            <a class="btn-orange btn-info far fa-eye" href="{{ route('vacancies.show',$vacancy->id) }}"></a>
                          @csrf
                        </form>
                      </td>
                    </tr>
                </table>
              </div>
            @endforeach
          </div>
        </div>
          <div href="#item2" type="button" class="section_name" data-toggle="collapse" data-parent="#accordeon">Архив</div>
        <div class="collapse" id="item2">
          <div class="card-body">
            @foreach ($archiveVacancies as $vacancy)
              <div class="card test">
                <table class="table">
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
