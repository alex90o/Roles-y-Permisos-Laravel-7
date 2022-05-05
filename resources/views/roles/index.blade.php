@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
            <div class="card">
                <div class="card-header">
                    <h2>Lista de Roles</h2>
                </div>

                <div class="card-body">
                    <a href="{{route('role.create')}}"
                    class="btn btn-primary float-right"
                        >Crear</a>
                    <br><br>    
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Full-access</th>
                                <th colspan=3></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($roles as $role)
                                <th scope="row">{{$role->id}}</th>
                                <td>{{$role->nombre}}</td>
                                <td>{{$role->slug}}</td>
                                <td>{{$role->descripcion}}</td>
                                <td>{{$role['full-access']}}</td>
                                <td><a class="btn btn-info" href="{{route('role.show',$role->id)}}">ver</a></td>
                                <td><a class="btn btn-success" href="{{route('role.edit',$role->id)}}">editar</a></td>
                                <td><a class="btn btn-danger" href="{{route('role.destroy',$role->id)}}">eliminar</a></td>
                                @endforeach
                            </tr>
            
                        </tbody>
                    </table>
                    </div>
                    {{$roles->links()}}
                </div>
            </div>
       
    </div>
</div>
@endsection
