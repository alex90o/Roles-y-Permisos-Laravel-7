@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Lista de Roles</h2>
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">nombre</th>
                                <th scope="col">slug</th>
                                <th scope="col">descripción</th>
                                <th scope="col">full-access</th>
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
                                
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
