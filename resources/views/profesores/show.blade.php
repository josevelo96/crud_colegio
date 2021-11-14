@extends('dashboard')

@section('title', ' | Ver Profesor')

@section('content')
    <div class="row">
        <div class="col-xs-10 offset-xs-1 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            <form>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" 
                        value="{{$profesor->nombre}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" 
                        value="{{$profesor->apellidos}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="genero">Género</label>
                    <select class="form-select" id="genero" name="genero" aria-label="Género">
                        <option value="{{$profesor->genero}}">{{$profesor->genero}}</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
@endsection