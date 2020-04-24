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
        <h3 class="text-muted">Usuarios</h3>
    </div>

    <div class="col-4 text-right">
        @can('add_user')
            <a href="{{ route('users.create') }}" class="btn btn-primary">Registrar</a>
        @endcan
    </div>
</div>
<div class="card table-responsive">
    <table class="table table-hover table-striped text-center border-bottom">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo Electrónico</th>
                <th scope="col" style="    width: 240px;"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            @if ($user->is_admin == 1 && $user->id != \Auth::id())
                        @continue
                    @endif
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td class="clearfix">
                    
                    @can('admin_permission')
                        @if ($user->id != \Auth::id())
                            <a href="{{ route('users.permission',$user->id) }}" class="btn btn-sm btn-success mr-1">Permisos</a>
                        @endif
                    @endcan

                    @can('edit_user')
                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-sm btn-primary mr-1">Editar</a>
                    @endcan
                    @can('delete_user')
                        @if ($user->id != \Auth::id())
                        <a href="{{ route('users.destroy',$user->id) }}" class="btn btn-sm btn-danger ml-1">Eliminar</a></td>
                        @endif
                    @endcan

                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-12 text-right">
            {{$users->links()}}
        </div>
    </div>
</div>
@endsection
