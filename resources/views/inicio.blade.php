@extends('layouts.app')

@section('content')
    @isset($hilos)
        <div class="foroContainer">
            @foreach($hilos as $hilo)
                <div class="foroSeccion">
                    <h4><a href="/categoria/{{$hilo->id_categoria}}">{{$hilo->tituloCat}}</a></h4>
                    <span>Último post:
                        <em>{{$hilo->titulo}}</em> por <strong>{{$hilo->name}}</strong>
                    </span>
                </div>
            @endforeach
            @auth
                @if(Auth::user()->tipo_user === 'admin')
                    <a href="#">Añade categoría</a>
                @endif
            @endAuth
        </div>
    @else
        <span>No hay resultados en DB</span>
    @endisset
@endsection
