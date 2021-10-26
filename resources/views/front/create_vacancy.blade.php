@extends('layouts.app')
@section('content')
    <form action="{{route('store-vacancy')}}" method="POST">
        @csrf
        <input type="text" name="name"/>
        <input type="text" name="country_id"/>
        <input type="text" name="city_id"/>
        <input type="text" name="region_id"/>
        <select type="text" name="form_of_employment">
            @foreach((array)json_decode(env('FORM_OF_EMPLOYMENT')) as $id=>$name)
                <option value="{{$id}}">{{$name}}</option>
            @endforeach
        </select>
        <select type="text" name="type_of_praktic">
            @foreach((array)json_decode(env('TYPE_OF_PRAKTIC')) as $id=>$name)
                <option value="{{$id}}">{{$name}}</option>
            @endforeach
        </select>

        <select type="text" name="duration_time">
            @foreach((array)json_decode(env('DURATION')) as $id=>$name)
                <option value="{{$id}}">{{$name}}</option>
            @endforeach
        </select>
        <select type="text" name="form_of_cooperation">
            @foreach((array)json_decode(env('FORM_OF_COOPERATION')) as $id=>$name)
                <option value="{{$id}}">{{$name}}</option>
            @endforeach
        </select>
        <textarea name="description"></textarea>
        <input type="submit"/>
    </form>
@stop
