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
        <div href="#item1" type="button" class="section_name" data-toggle="collapse" data-parent="#accordeon">Активные позиции</div>
        <div class="collapse" id="item1">
          <div class="card">

          </div>
        </div>

        <div href="#item2" type="button" class="section_name" data-toggle="collapse" data-parent="#accordeon">Собеседование </div>
        <div class="collapse" id="item2">
        @foreach ($proposalsApprove as $proposal)
        <div class="card">
                  <table class="table">
                      <tr>
                          <td>{{ date("d-m-Y", strtotime($proposal->created_at)) }}</td>
                          <td>
                              {{ $proposal->vacancy->title}}
                          </td>

                          <td>
                              {{ $proposal->vacancy->description }}
                          </td>
                          <td>
                              <form action="" method="POST">
                                  @method('DELETE')
                                  <button type="hidden" class="fa fa-times btn-orange btn-danger"></button>
                                  @csrf
                              </form>
                              <a class="btn-orange btn-primary fa fa-check" href=""></a>

                          </td>
                      </tr>
                  </table>
              
          </div>
            @endforeach
        </div>


        <div href="#item3" type="button" class="section_name" data-toggle="collapse" data-parent="#accordeon">Активные заявки</div>
        <div class="collapse show" id="item3">

          @foreach ($proposalsAwait as $proposal)
          <div class="card">
                  <table class="table">
                      <tr>
                          <td>{{ date("d-m-Y", strtotime($proposal->created_at)) }}</td>
                          <td>
                              {{ $proposal->vacancy->title}}
                          </td>

                          <td>
                          {{ $proposal->vacancy->description }}
                          </td>
                          <td>
                              <form action="" method="POST">
                                  @method('DELETE')
                                  <button type="hidden" class="fa fa-times btn-orange btn-danger"></button>
                                  @csrf
                              </form>
                              <a class="btn-orange btn-primary fa fa-check" href=""></a>

                          </td>
                      </tr>
                  </table>
              
          </div>@endforeach
        </div>

        <div href="#item4" type="button" class="section_name" data-toggle="collapse" data-parent="#accordeon">Архив</div>
        <div class="collapse" id="item4">
          <div class="card">

          </div>
        </div>
      </div>
    </div>
  </div>
@stop
