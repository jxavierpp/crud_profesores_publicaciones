@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 style="position: absolute;"><strong>Lista de Publicaciones</strong></h4>
            <a href="{{ URL::to('publicaciones/create') }}">
                <button type="button" class="btn btn-sm btn-primary float-right">Añadir Publicacion</button>
            </a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th>Referencia</th>
                    <th>Tipo</th>
                    <th>Año de Publicacion</th>
                    <th>Profesores Involucrados</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($pubs as $pub)
                    <tr>
                        <td>{{ $pub->referencia }}</td>
                        <td>{{ $pub->tipo }}</td>
                        <td>{{ $pub->year }}</td>
                        <td>
                            <ul class="list-group">
                                @foreach ($pub->profesores as $profesor)
                                    @if ($loop->iteration > 0)
                                        <li class="list-group-item">
                                            {{ $profesor->nombre }}
                                        </li>
                                    @endif
                                @endforeach
                                @if (count($pub->profesores) < 1)
                                    <li class="list-group-item">
                                        Sin Asignar.
                                    </li>
                                @endif
                            </ul>
                        </td>
                        <td>
                            <div style="float: right">
                                {!! Form::open(['route'=>['publicaciones.destroy', $pub->id], 'method'=>'DELETE']) !!}
                                    <button name="submit" type="submit" class="btn btn-sm btn-danger">Borrar</button>
                                {!! Form::close() !!}
                            </div>
                            <a href="{{ route("publicaciones.edit", $pub->id) }}" class="btn btn-sm btn-info pull-right" style="margin-right: 5px">Editar</span></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
