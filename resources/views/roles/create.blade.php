@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Crear Rol</h2>
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('role.store') }}" method="post">
                        @csrf

                        <div class="container">
                            <h3>Requiere datos</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="slug" placeholder="Slug">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" placeholder="Descripción" id="descripcion"
                                    name="descripcion" rows="3"></textarea>
                            </div>
                            <hr>
                            <h3>Acceso Completo</h3>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="full-access"
                                    class="custom-control-input" value="yes">
                                <label class="custom-control-label" for="fullaccessyes">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="full-access"
                                    class="custom-control-input" value="no" checked>
                                <label class="custom-control-label" for="fullaccessno">No</label>
                            </div>
                            <hr>
                            <h3>Lista de Permisos</h3>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Check this custom
                                    checkbox</label>
                            </div>

                        </div>

                    </form>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
