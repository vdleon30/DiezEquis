@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-4">
        @if (session("message_success"))
    <div class="col-12 alert alert-success alert-dismissible fade show" role="alert">
        {{ session("message_success")}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
        <div class="col-8">
            <h3 class="text-muted">Publicaciones</h3>
        </div>
        @can('add_post')
            <div class="col-4 text-right">
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Registrar</a>
            </div>
        @endcan
        
    </div>
    <div class="card table-responsive">
        <table class="table table-hover table-striped text-center border-bottom">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col" style="width: 390px">Título</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Comentarios</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user->name}} <br>{{$post->user->email}} </td>
                    <td class="text-center">{{$post->comments->count()}}</td>
                    <td class="clearfix">
                    <a href="{{ route('posts.view',$post->id) }}" class="btn btn-sm btn-success m-1">Ver</a>
                    @can('edit_post')
                        <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-sm btn-primary m-1">Editar</a>
                    @endcan
                    @can('delete_post')
                    <a href="{{ route('posts.destroy',$post->id) }}" class="btn btn-sm btn-danger m-1">Eliminar</a></td>
                    @endcan
                    
                </tr>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-12 text-right">
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection
