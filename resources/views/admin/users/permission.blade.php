@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-4">
        <div class="col-8">
            <h3 class="text-muted">Editar Permisos</h3>
        </div>
        <div class="col-4 text-right">
            <a href="{{ route('users') }}" class="btn btn-danger">Cancelar</a>
        </div>
        <div class="col-8 offset-2 mt-3 ">
            <div class="card">
                <div class="card-body px-5">
                    <form method="POST" action="{{ route('users.update.permission') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}"/>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" width="10">
                                        <div class="custom-control custom-checkbox mt-0 create-account-toggle" data-placement=top data-html=true title="Seleccionar Todos" data-toogle=tooltip>
                                            <input type="checkbox" class="custom-control-input" id="checkAll" >
                                            <label  class="custom-control-label" for="checkAll">
                                            </label>
                                        </div>
                                    </th>
                                    <th scope="col">Permisos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <div class="custom-control custom-checkbox mt-0 create-account-toggle ">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="permission[admin_permission]" {{$user->hasPermission("admin_permission")?"checked":""}}>
                                            <label class="custom-control-label" for="customCheck1"> </label>
                                        </div>
                                    </th>
                                    <td>
                                        <label class="" for="customCheck1">Administrar Permisos</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="custom-control custom-checkbox mt-0 create-account-toggle ">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="permission[add_user]" {{$user->hasPermission("add_user")?"checked":""}}>
                                            <label class="custom-control-label" for="customCheck2" > </label>
                                        </div>
                                    </th>
                                    <td>
                                        <label class="" for="customCheck2">Agregar Usuarios</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="custom-control custom-checkbox mt-0 create-account-toggle ">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3" name="permission[edit_user]" {{$user->hasPermission("edit_user")?"checked":""}}>
                                            <label class="custom-control-label" for="customCheck3" > </label>
                                        </div>
                                    </th>
                                    <td>
                                        <label class="" for="customCheck3">Editar Usuarios</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="custom-control custom-checkbox mt-0 create-account-toggle ">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4" name="permission[delete_user]" {{$user->hasPermission("delete_user")?"checked":""}}>
                                            <label class="custom-control-label" for="customCheck4" > </label>
                                        </div>
                                    </th>
                                    <td>
                                        <label class="" for="customCheck4">Eliminar Usuarios</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="custom-control custom-checkbox mt-0 create-account-toggle ">
                                            <input type="checkbox" class="custom-control-input" id="customCheck5" name="permission[add_post]" {{$user->hasPermission("add_post")?"checked":""}}>
                                            <label class="custom-control-label" for="customCheck5" > </label>
                                        </div>
                                    </th>
                                    <td>
                                        <label class="" for="customCheck5">Agregar Publicaciones</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="custom-control custom-checkbox mt-0 create-account-toggle ">
                                            <input type="checkbox" class="custom-control-input" id="customCheck6" name="permission[edit_post]" {{$user->hasPermission("edit_post")?"checked":""}}>
                                            <label class="custom-control-label" for="customCheck6" > </label>
                                        </div>
                                    </th>
                                    <td>
                                        <label class="" for="customCheck6">Editar Publicaciones</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="custom-control custom-checkbox mt-0 create-account-toggle ">
                                            <input type="checkbox" class="custom-control-input" id="customCheck7" name="permission[delete_post]" {{$user->hasPermission("delete_post")?"checked":""}}>
                                            <label class="custom-control-label" for="customCheck7" > </label>
                                        </div>
                                    </th>
                                    <td>
                                        <label class="" for="customCheck7">Eliminar Publicaciones</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="custom-control custom-checkbox mt-0 create-account-toggle ">
                                            <input type="checkbox" class="custom-control-input" id="customCheck8" name="permission[add_comment]" {{$user->hasPermission("add_comment")?"checked":""}}>
                                            <label class="custom-control-label" for="customCheck8" > </label>
                                        </div>
                                    </th>
                                    <td>
                                        <label class="" for="customCheck8">Agregar Comentarios</label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="custom-control custom-checkbox mt-0 create-account-toggle ">
                                            <input type="checkbox" class="custom-control-input" id="customCheck9" name="permission[delete_comment]" {{$user->hasPermission("delete_comment")?"checked":""}}>
                                            <label class="custom-control-label" for="customCheck9" > </label>
                                        </div>
                                    </th>
                                    <td>
                                        <label class="" for="customCheck9">Eliminar Comentarios</label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
@section('scripts')
{{-- expr --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('[data-placement="tooltip"]').tooltip();

        $("#checkAll").click(function(){
            $('input:checkbox').not(this).each(function(){
                if ($("#checkAll")[0].checked && ! $(this)[0].checked) {
                    $(this).prop('checked', $("#checkAll")[0].checked)

                }else if(!$("#checkAll")[0].checked){
                    $(this).prop('checked', $("#checkAll")[0].checked)
                }
            })
        });
        $('input:checkbox').not("#checkAll").click(function(){
            var aux = 1;
            $('input:checkbox').not("#checkAll").each(function(){
                if (! $(this)[0].checked) 
                    aux = 0
            })
            if (aux == 1) 
                $("#checkAll").prop('checked', true);
            else
                $("#checkAll").prop('checked', false);
        })

        var aux = 1;
        $('input:checkbox').not("#checkAll").each(function(){
            if (! $(this)[0].checked) 
                aux = 0
        })
        if (aux == 1) 
            $("#checkAll").prop('checked', true);
        else
            $("#checkAll").prop('checked', false);
    })

</script>
@endsection
