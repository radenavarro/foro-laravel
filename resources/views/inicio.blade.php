@extends('layouts.app')

@section('content')
    @auth
        @if(Auth::user()->tipo_user === 'admin')
            @isset($categorias)
                <div class="foroContainer">
                @foreach($hilos as $hilo)
                    <div class="foroSeccion">
                        <h4>{{$hilo->tituloCat}}</h4>
                        <a href="/addThread/{{$hilo->id_categoria}}">Añade hilo</a>
                        <span>Último post:
                            <em>{{$hilo->titulo}}</em> por <strong>{{$hilo->name}}</strong>
                        </span>
                    </div>
                @endforeach
                    <a href="#">Añade categoría</a>
                </div>
            @else
                <span>No hay resultados en DB</span>
            @endisset
        @endif
    @endAuth
@endsection
