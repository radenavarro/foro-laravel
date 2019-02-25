@extends('layouts.app')

@section('content')
    <a href="/">Volver</a>
    @isset($hilosUltimoPost)
        <div class="foroContainer">
            <div class="foroSeccion">
                <div class="hiloInfo">Hilo</div><div class="hiloAutor">Autor</div>
            </div>
            @foreach($hilosUltimoPost as $hilo)
                <div class="foroSeccion">
                    <div class="hiloInfo">
                        <a href="/hilo/{{$hilo->id}}">{{$hilo->titulo}}</a>
                    </div>
                    <div class="hiloAutor">Último mensaje por {{$hilo->name}} a las {{$hilo->created_at}}</div>
                </div>
            @endforeach
            </div>
        </div>
    @endisset
    @if(Auth::user()->tipo_user === 'admin')
        {{--TODO: FUNCIONALIDAD DE ADMIN--}}
    @endif
@endsection
