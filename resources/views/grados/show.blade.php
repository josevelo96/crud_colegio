@extends('dashboard')

@section('title', ' | Ver Grado')

@section('content')
    <div class="row">
        <div class="col-xs-10 offset-xs-1 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            <form>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" 
                        value="{{$grado->nombre}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="profesor_id">Profesor</label>
                    <select class="form-select" id="profesor_id" name="profesor_id" aria-label="Profesor">
                        <option value="{{$grado->profesor_id}}">{{ $grado->profesor->nombreCompleto() }}</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
@endsection