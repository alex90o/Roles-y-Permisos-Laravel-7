@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Editar</h2>
                </div>

                <div class="card-body">
                @include('custom.message') 

                    <form action="{{ route('role.update', $role->id )}}" method="post">
                    @csrf    
                    @method('PUT')

                        <div class="container">
                            <h3>Requiere datos</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre"
                                value="{{old('nombre', $role->nombre)}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug"
                                value="{{old('slug', $role->slug)}}">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" placeholder="Descripción" id="descripcion"
                                    name="descripcion" rows="3" >
                                    {{old('descripcion', $role->descripcion)}}
                                </textarea>
                            </div>
                            <hr>
                            <h3>Acceso Completo</h3>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessyes" name="full-access"
                                    class="custom-control-input" value="yes"
                                    @if ($role ['full-access']=="yes")
                                        checked
                                    @elseif(old ('full-access')=="yes")
                                        checked
                                    @endif
                                    >
                                <label class="custom-control-label" for="fullaccessyes">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="fullaccessno" name="full-access"
                                    class="custom-control-input" value="no"
                                    @if ($role ['full-access']=="no")
                                        checked
                                    @elseif(old ('full-access')=="no")
                                        checked
                                    @endif
                                    >
                                <label class="custom-control-label" for="fullaccessno">No</label>
                            </div>
                            <hr>
                            <h3>Lista de Permisos</h3>

                            @foreach($permisos as $permiso)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" 
                                id="permiso_{{$permiso->id}}"
                                value="{{ $permiso->id}}" name="permiso[]"
                                
                                @if(is_array (old('permiso')) && in_array("$permiso->id", old ('permiso')))
                                checked
                                @elseif(is_array ($permiso_rol) && in_array("$permiso->id", $permiso_rol))
                                checked
                                @endif>
                               
                                <label class="custom-control-label" for="permiso_{{$permiso->id}}">
                                    {{ $permiso->id}}
                                    -
                                    {{ $permiso->nombre}}
                                    <em>({{$permiso->descripcion}})</em>
                                </label>
                            </div>
                            @endforeach
                            <hr>
                            <input type="submit" class="btn btn-primary" value="Guardar">

                        </div>

                    </form>

 




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
