@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-4">
        <div class="col-8">
            <h3 class="text-muted">Editar Publicación</h3>
        </div>
        <div class="col-4 text-right">
            <a href="{{ route('users') }}" class="btn btn-danger">Cancelar</a>
        </div>
        <div class="col-8 offset-2 mt-3 ">
            
    <div class="card">
        <div class="card-body px-5">
            <form method="POST" action="{{ route('posts.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$post->id}}">
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-12  justify-content-center">
                        <label for="title" class="text-purple font-weight-bold">Título</label>
                        <input id="title" type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $post->title }}" placeholder="Introduzca el título..." required autofocus>

                        @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>

                    
                    <div class="form-group col-sm-12  justify-content-center">
                        <label for="body" class="text-purple font-weight-bold">Contenido</label>
                        <textarea rows="6" class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}" name="body" required="" autofocus>{{ $post->body }}</textarea>
                        @if ($errors->has('body'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button class="btn btn-success" type="submit">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
    </div>
        </div>

</div>
@endsection
