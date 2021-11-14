@extends('dashboard')

@section('title', ' | Agregar Clase')

@section('content')
    <div class="row">
        <div class="col-xs-10 offset-xs-1 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            <form action="{{route('clases.store')}}" method="POST">
                @method('POST')
                @csrf
                <input type="hidden" name="alumno_id" id="alumno_id" value="{{ $alumno->id }}">
                <h3>Agregar Clase</h3>
                <p><b>Alumno: </b> {{ $alumno->nombreCompleto() }}</p>
                <br>
                <div class="mb-3">
                    <label for="seccion" class="form-label">Sección</label>
                    <input type="text" class="form-control" id="seccion" name="seccion" 
                        value="{{ old('seccion') }}" placeholder="Escriba la sección...">
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
            apply_data_to_select('grado_id', 'grado-id');
        });
    </script>
@endsection