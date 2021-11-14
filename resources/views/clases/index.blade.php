@extends('dashboard')
@section('title', ' | Clases')
@section('content')
    <div class="row">
        <div class="col-9 offset-1">
            <h3>Clases</h3>
            <a class="btn btn-outline-success btn-lg" href="{{route('clases.create')}}">Agregar</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-10 offset-1">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Grado</th>
                        <th>Sección</th>
                        <th>Profesor</th>
                        <th style="width:100px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumnos_grados as $alumno_grado)
                        <tr class="table-light">
                            <td>{{$alumno_grado->alumno->nombreCompleto()}}</td>
                            <td>{{$alumno_grado->grado->nombre}}</td>
                            <td>{{$alumno_grado->seccion}}</td>
                            <td>{{$alumno_grado->grado->profesor->nombreCompleto()}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-1"><a class="text-dark" title="Ver" href="{{route('clases.show', ['alumno_grado' => $alumno_grado->id])}}"><i class="fas fa-eye"></i></a></div>
                                    <div class="col-1"><a class="text-dark" title="editar" href="{{route('clases.edit', ['alumno_grado' => $alumno_grado->id])}}"><i class="fas fa-pen"></i></a></div>
                                    <div class="col-1">
                                        <form id="delete_{{ $alumno_grado->id }}" action="{{route('clases.destroy', ['alumno_grado' => $alumno_grado->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="table-btn-delete"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $alumnos_grados->links() }}
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {

            document.querySelector('.table-btn-delete')?.addEventListener("click", function(e) {
                e.preventDefault();
                                // icon -> button -> form
                let formObject = e.target.parentNode.parentNode;
                confirmDeleteAction(formObject, 'Clase');
            });

        });
    </script>
@endsection