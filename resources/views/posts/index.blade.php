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
                                      <div class="section_name offset-lg-1">
                                        Основная информация -
                                      </div>
                                      @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                          <p>{{ $message }}</p>
                                        </div>
                                      @endif
                                      @foreach ($posts as $post)
                                        <div class="card">
                                            <table class="table">
                                                <tr>
                                                        <td>{{ $post->title }}</td>
                                                        <td>{{ $post->description }}</td>
                                                        <td>{{ $post->city }}</td>
                                                        <td>
                                                        <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                                        @method('DELETE')
                                                            <button type="submit" class="far fa-trash-alt btn btn-danger"></button>
                                                            <a class="btn btn-primary far fa-edit" href="{{ route('posts.edit',$post->id) }}"></a>
                                                            <a class="btn btn-info far fa-eye" href="{{ route('posts.show',$post->id) }}"></a>
                                                            @csrf
                                                        </form>
                                                        </td>
                                                    </tr>
                                            </table>
                                        </div>
                                        @endforeach


                                        <div class="section_name offset-lg-1">
                                            Архив -
                                        </div>
      
                                    </div>

                            </div>
                        </div>
    </section>

@stop