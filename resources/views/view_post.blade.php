@extends('layouts.app')

@section('content')
<div class="container">
    @if (session("message_success"))
    <div class="col-12 alert alert-success alert-dismissible fade show" role="alert">
        {{ session("message_success")}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->body}}</p>
                <p class="card-text"><small class="text-muted">{{$post->comments->count()}} {{$post->comments->count()==1?"Comentario":"Comentarios"}}</small> </p>
            </div>
        </div>
        <form method="POST" action="{{ route('comments.save') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-12  justify-content-center">
                        <label for="body" class="text-purple font-weight-bold">Comentar Publicación</label>
                        <textarea rows="6" class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}" name="body" required="" autofocus>{{ old('body') }}</textarea>
                        @if ($errors->has('body'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit">Enviar Comentario</button>
                </div>
            </form>
            <hr>
        <h3 class="text-muted">Comentarios</h3>
        <div class="card">
            <div class="card-body">
                @foreach ($post->comments as $key => $comment)
                    {!!$key == 0?"":"<hr>"!!}
                    <p class="card-text">{{$comment->body}}</p>
                    <p class="card-text text-right"><small class="text-muted">{{$comment->user->name}} - {{$comment->created_at}} </small> </p>
                @endforeach
                @if ($post->comments->isEmpty())
                    <p class="card-text text-muted text-center h4 my-4">No hay comentarios disponibles.</p>
                    {{-- expr --}}
                @endif
            </div>
        </div>

</div>
@endsection
