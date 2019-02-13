@extends('layouts.app')

@section('content')
    @auth
        @if(Auth::user()->tipo_user === 'admin')
            @isset($categorias)
                <div class="foroContainer">
                @foreach($categorias as $cat)
                    <div class="foroSeccion">
                        <h4>{{$cat->titulo}}</h4>
                        <button>Añade categoría</button>
                        <span>Último post: {{print_r($hilos)}}</span>
                    </div>
                @endforeach
                </div>
            @else
                <span>No hay resultados en DB</span>
            @endisset
        @endif
    @endAuth
@endsection
