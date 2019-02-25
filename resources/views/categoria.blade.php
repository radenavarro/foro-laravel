@extends('layouts.app')

@section('content')
    <a href="/">Volver</a>
    @isset($hilosUltimoPost)
        <div class="categoriaCont">
            <div class="hiloInfo"></div><div class="hiloAutor"></div>
            @foreach($hilosUltimoPost as $hilo)
                <div class="hiloInfo">
                    <a href="/hilo/{{$hilo->id}}">{{$hilo->titulo}}</a>
                </div>
                <div class="hiloAutor">Último mensaje por {{$hilo->name}} a las {{$hilo->created_at}}</div>
            @endforeach
        </div>    
    @endisset
    @if(Auth::user()->tipo_user === 'admin')
        {{--TODO: FUNCIONALIDAD DE ADMIN--}}
    @endif
@endsection
