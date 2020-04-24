@extends('layouts.app')

@section('content')



<div class="container">
    <div class="card-columns">
        @foreach ($posts as $post)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->body}}</p>
                    <p class="card-text"><small class="text-muted">{{$post->comments->count()}} {{$post->comments->count()==1?"Comentario":"Comentarios"}} | </small> <small class="text-muted"><a href="{{ route('posts.view',$post->id) }}">@can('add_comment')
                        Comentar
                        @else
                        Ver
                    @endcan</a></small></p>
                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection
