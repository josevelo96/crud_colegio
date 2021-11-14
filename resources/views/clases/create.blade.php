@extends('dashboard')

@section('title', ' | Agregar Clase')

@section('content')
    <div class="row">
        <div class="col-xs-10 offset-xs-1 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            <form action="{{route('clases.store')}}" method="POST">
                @method('POST')
                @csrf
                <div class="mb-3">
                    <label for="seccion" class="form-label">Sección</label>
                    <input type="text" class="form-control" id="seccion" name="seccion" 
                        value="{{ old('seccion') }}" placeholder="Escriba la sección...">
                </div>
                <div class="mb-3">
                    <label for="alumno_id">Alumno</label>
                    <select class="form-select" data-alumno-id="{{ old('alumno_id') }}" id="alumno_id" name="alumno_id" aria-label="Alumno">
                        <option value="">Seleccione Alumno</option>
                        @foreach($alumnos as $alumno)
                            <option value="{{$alumno->id}}">{{ $alumno->nombreCompleto() }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="grado_id">Grado</label>
                    <select class="form-select" data-grado-id="{{ old('grado_id') }}" id="grado_id" name="grado_id" aria-label="Grado">
                        <option value="">Seleccione Grado</option>
                        @foreach($grados as $grado)
                            <option value="{{$grado->id}}">{{ $grado->nombre }} - {{ $grado->profesor->nombreCompleto() }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-lg btn-success">Guardar</button>
            </form>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            apply_data_to_select('alumno_id', 'alumno-id');
            apply_data_to_select('grado_id', 'grado-id');
        });
    </script>
@endsection