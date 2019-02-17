@extends('layouts.app')

@section('content')
    <a href="/">Volver</a>
    @isset($todosLosHilos)
        <div class="categoriaCont">
            @foreach($todosLosHilos as $hilo)
                <div class="hilo">
                    <a href="/hilo/{{$hilo->hiloid}}">{{$hilo->titulo}}</a>
                </div>
            @endforeach
        </div>    
    @endisset
    @if(Auth::user()->tipo_user === 'admin')
        {{--TODO: FUNCIONALIDAD DE ADMIN--}}
    @endif
@endsection
