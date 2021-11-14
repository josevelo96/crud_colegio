@extends('dashboard')

@section('title', ' | Alumnos')

@section('content')
    <div class="row">
        <div class="col-9 offset-1">
            <h3>Alumnos</h3>
            <a class="btn btn-outline-success btn-lg" href="{{route('alumnos.create')}}">Agregar</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-10 offset-1">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Género</th>
                        <th>Fecha Nac.</th>
                        <th style="width:100px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumnos as $alumno)
                        <tr class="table-light">
                            <td>{{$alumno->nombre}}</td>
                            <td>{{$alumno->apellidos}}</td>
                            <td>{{$alumno->genero}}</td>
                            <td>{{$alumno->nacimiento()}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-1"><a class="text-dark" title="Ver" href="{{route('alumnos.show', ['alumno' => $alumno->id])}}"><i class="fas fa-eye"></i></a></div>
                                    <div class="col-1"><a class="text-dark" title="editar" href="{{route('alumnos.edit', ['alumno' => $alumno->id])}}"><i class="fas fa-pen"></i></a></div>
                                    <div class="col-1"><a class="text-dark" title="clases" href="{{route('alumnos.clases', ['alumno' => $alumno->id])}}"><i class="fas fa-clipboard-list"></i></a></div>
                                    <div class="col-1">
                                        <form id="delete_{{ $alumno->id }}" action="{{route('alumnos.destroy', ['alumno' => $alumno->id])}}" method="POST">
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
            {{ $alumnos->links() }}
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
                confirmDeleteAction(formObject, 'Alumno');
            });

        });
    </script>
@endsection