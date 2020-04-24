@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-4">
        <div class="col-8">
            <h3 class="text-muted">Editar Usuarios</h3>
        </div>
        <div class="col-4 text-right">
            <a href="{{ route('users') }}" class="btn btn-danger">Cancelar</a>
        </div>
        <div class="col-8 offset-2 mt-3 ">
            
    <div class="card">
        <div class="card-body px-5">
            <form method="POST" action="{{ route('users.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-12 col-md-6 justify-content-center">
                        <label for="name" class="text-purple font-weight-bold">Nombre</label>
                        <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" placeholder="Introduzca el nombre..." required autofocus>

                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    
                    <div class="form-group col-sm-12 col-md-6 justify-content-center">
                        <label for="email" class="text-purple font-weight-bold">Correo Electrónico</label>
                        <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" placeholder="Introduzca el correo electrónico..." required autofocus>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-xs-12 col-sm-6">
                            <label class="text-purple font-weight-bold" for="password">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña"  min="6">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-xs-12 col-sm-6">
                            <label class="text-purple font-weight-bold" for="password-confirm">{{ __('Confirmar Contraseña') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña"  min="6">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
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
