@extends('layouts.app')

@section('content')
    <a class="btn btn-danger" href="/">Volver</a>
    @if(Auth::user()->tipo_user === 'admin')
        <a class="btn btn-info btnCrearHilo" href="/nuevohilo/{{$datosCategoria->id}}">Crear hilo</a>
    @endif
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
