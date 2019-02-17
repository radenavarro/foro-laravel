@extends('layouts.app')

@section('content')
    <a href="/">Volver</a>
    @isset($postsEnHilo)
        <div class="hiloCont">
            @foreach($postsEnHilo as $post)
                <div class="post">
                    {{$post->texto}}
                </div>
            @endforeach
        </div>
    @endisset
    @if(Auth::user()->tipo_user === 'admin')
        {{--TODO: FUNCIONALIDAD DE ADMIN--}}
    @endif
@endsection
