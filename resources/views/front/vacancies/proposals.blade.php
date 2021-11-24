@extends('layouts.profile')
@section('content')

<div class="actions_vacancies">
  <div class="shown">
    <input type="hidden" value="PUT" name="_method" />
    <div class="section">
      <div class="col-lg-7 offset-lg-1">
          <h2>Viewing proposals for a vacancy</h2>
      </div>
      <div id="accordeon">
        <div href="#item1" type="button" class="section_name" data-toggle="collapse" data-parent="#accordeon">Собеседования</div>
        <div class="collapse show" id="item1">
        <div class="card-body">
        </div>
        </div>
        <div href="#item2" type="button" class="section_name" data-toggle="collapse" data-parent="#accordeon">Ожидают рассмотрения</div>
        <div class="collapse show" id="item2">
        <div class="card-body">
            @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
            @endif
            @forelse ($vacancy->users as $user )
            <div class="card">
              <table class="table">
                <tr>
                  <td class="titre">{{ $user->last_name }} {{ $user->first_name }}</td>
                  <td>
                    <form method="POST">
                        <div type="button" class="fa-2x fas fa-times cross" href="{{ route('vacancies.show',$vacancy->id) }}"></div>
                        <div type="button" class="fa-2x fas fa-check check" href="{{ route('vacancies.edit',$vacancy->id) }}"></div>
                      @csrf
                    </form>
                  </td>
                </tr>
              </table>
            </div>
            @empty
                <span> Aucun candidat pour ce job</span>
              @endforelse
          </div>
        </div>
        <div href="#item3" type="button" class="section_name" data-toggle="collapse" data-parent="#accordeon">Архив</div>
        <div class="collapse show" id="item3">
          <div class="card-body">
          </div>
        </div>
      </div>
        <div class="form-group row mb-0">
          <div class="col-md-5 offset-lg-8">
          <a class="btn btn-orange" href="{{ route('vacancies.index') }}"> {{ __('назад') }}</a>
        </div>
      </div>
    </div>
  </div>
</div>

@stop
