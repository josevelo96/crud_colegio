@extends('dashboard')

@section('title', ' | Editar Profesor')

@section('content')
    <div class="row">
        <div class="col-xs-10 offset-xs-1 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            <form action="{{route('profesores.update', ['profesor' => $profesor->id])}}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" 
                        value="{{old('nombre') ?: $profesor->nombre}}" placeholder="Escriba el nombre del profesor...">
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" 
                        value="{{old('apellidos') ?: $profesor->apellidos}}" 
                        placeholder="Escriba los apellidos del profesor...">
                </div>
                <div class="mb-3">
                    <label for="genero">Género</label>
                    <select class="form-select" data-genero="{{old('genero') ?: $profesor->genero}}" id="genero" name="genero" aria-label="Género">
                        <option value="">Seleccione género</option>
                        <option value="masculino">masculino</option>
                        <option value="femenino">femenino</option>
                        <option value="otro">otro</option>
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
            apply_data_to_select('genero', 'genero');
        });
    </script>
@endsection