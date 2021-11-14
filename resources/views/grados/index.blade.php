@extends('dashboard')
@section('title', ' | Grados')
@section('content')
    <div class="row">
        <div class="col-9 offset-1">
            <h3>Grados</h3>
            <a class="btn btn-outline-success btn-lg" href="{{route('grados.create')}}">Agregar</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-10 offset-1">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Profesor</th>
                        <th style="width:100px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($grados as $grado)
                        <tr class="table-light">
                            <td>{{$grado->nombre}}</td>
                            <td>{{$grado->profesor->nombreCompleto()}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-1"><a class="text-dark" title="Ver" href="{{route('grados.show', ['grado' => $grado->id])}}"><i class="fas fa-eye"></i></a></div>
                                    <div class="col-1"><a class="text-dark" title="editar" href="{{route('grados.edit', ['grado' => $grado->id])}}"><i class="fas fa-pen"></i></a></div>
                                    <div class="col-1">
                                        <form id="delete_{{ $grado->id }}" action="{{route('grados.destroy', ['grado' => $grado->id])}}" method="POST">
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
            {{ $grados->links() }}
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
                confirmDeleteAction(formObject, 'Grado');
            });

        });
    </script>
@endsection