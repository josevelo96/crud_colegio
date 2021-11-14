@extends('dashboard')

@section('title', ' | Agregar Grado')

@section('content')
    <div class="row">
        <div class="col-xs-10 offset-xs-1 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            <form action="{{route('grados.store')}}" method="POST">
                @method('POST')
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" 
                        value="{{ old('nombre') }}" placeholder="Escriba el nombre del grado...">
                </div>
                <div class="mb-3">
                    <label for="profesor_id">Profesor</label>
                    <select class="form-select" data-profesor-id="{{ old('profesor_id') }}" id="profesor_id" name="profesor_id" aria-label="Profesor">
                        <option value="">Seleccione Profesor</option>
                        @foreach($profesores as $profesor)
                            <option value="{{$profesor->id}}">{{ $profesor->nombreCompleto() }}</option>
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
            apply_data_to_select('profesor_id', 'profesor-id');
        });
    </script>
@endsection