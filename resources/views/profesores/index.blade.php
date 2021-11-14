@extends('dashboard')
@section('title', ' | Profesores')
@section('content')
    <div class="row">
        <div class="col-9 offset-1">
            <h3>Profesores</h3>
            <a class="btn btn-outline-success btn-lg" href="{{route('profesores.create')}}">Agregar</a>
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
                        <th style="width:100px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profesores as $profesor)
                        <tr class="table-light">
                            <td>{{$profesor->nombre}}</td>
                            <td>{{$profesor->apellidos}}</td>
                            <td>{{$profesor->genero}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-1"><a class="text-dark" title="Ver" href="{{route('profesores.show', ['profesor' => $profesor->id])}}"><i class="fas fa-eye"></i></a></div>
                                    <div class="col-1"><a class="text-dark" title="editar" href="{{route('profesores.edit', ['profesor' => $profesor->id])}}"><i class="fas fa-pen"></i></a></div>
                                    <div class="col-1">
                                        <form id="delete_{{ $profesor->id }}" action="{{route('profesores.destroy', ['profesor' => $profesor->id])}}" method="POST">
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
            {{ $profesores->links() }}
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {

            document.querySelector('.table-btn-delete').addEventListener("click", function(e) {
                e.preventDefault();
                                // icon -> button -> form
                let formObject = e.target.parentNode.parentNode;
                confirmDeleteAction(formObject, 'Profesor');
            });

        });
    </script>
@endsection