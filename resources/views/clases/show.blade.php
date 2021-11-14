@extends('dashboard')

@section('title', ' | Ver Clase')

@section('content')
    <div class="row">
        <div class="col-xs-10 offset-xs-1 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            <form>
                <div class="mb-3">
                    <label for="seccion" class="form-label">Sección</label>
                    <input type="text" class="form-control" id="seccion" name="seccion" 
                        value="{{$alumno_grado->seccion}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="alumno_id">Alumno</label>
                    <select class="form-select" id="alumno_id" name="alumno_id" aria-label="Profesor">
                        <option value="{{$alumno_grado->alumno_id}}">{{ $alumno_grado->alumno->nombreCompleto() }}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="grado_id">Grado</label>
                    <select class="form-select" id="grado_id" name="grado_id" aria-label="Profesor">
                        <option value="{{$alumno_grado->grado_id}}">
                            {{ $alumno_grado->grado->nombre }} - {{ $alumno_grado->grado->profesor->nombreCompleto() }}
                        </option>
                    </select>
                </div>
            </form>
        </div>
    </div>
@endsection