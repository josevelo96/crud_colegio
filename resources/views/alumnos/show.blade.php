@extends('dashboard')

@section('title', ' | Ver Alumno')

@section('content')
    <div class="row">
        <div class="col-xs-10 offset-xs-1 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            <form>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" 
                        value="{{ $alumno->nombre }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" 
                        value="{{ $alumno->apellidos }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" 
                        value="{{ $alumno->fecha_nacimiento }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="genero">Género</label>
                    <select class="form-select" data-genero="{{ $alumno->genero }}" id="genero" name="genero" aria-label="Género">
                        <option value="{{ $alumno->genero }}">{{ $alumno->genero }}</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
@endsection