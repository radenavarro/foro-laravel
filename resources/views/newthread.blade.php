@extends('layouts.app')

@section('content')
    <a href="/">Volver</a>
    @isset($datosCategoria)
        <div class="newThreadFormContainer">
            <h1>{{$datosCategoria->titulo}}</h1>
            <form action="/hilo" method="post">
                @csrf
                <label for="titulo">Título del hilo</label>
                <input type="text" name="titulo" placeholder="Escribe un titulo para el hilo">
                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" id="" cols="30" rows="10" placeholder="Escribe tu mensaje">

                </textarea>
                <input type="hidden" name="idCategoria" value="{{$datosCategoria->id}}">
                <input type="submit" class="btn btn-info" value="Crear hilo">
            </form>
        </div>
    @endisset
    @if(Auth::user()->tipo_user === 'admin')
        {{--TODO: FUNCIONALIDAD DE ADMIN--}}
    @endif
@endsection
