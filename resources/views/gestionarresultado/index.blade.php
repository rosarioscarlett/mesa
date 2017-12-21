@extends('layouts.app')
@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card card-plain">
        <div class="card-header" data-background-color="blue">
            <h4 class="title">Gestionar Encuestas</h4>
            <p class="category">Encuestas de Madurez</p>
        </div>
    </div>

    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('gestionarencuesta.create') }}"> Crear</a>

    </div>

    <form action="/admin/gestionarresultado" method="GET">
        <div class="input-group custom-search-form">
            <input type="text" class="form-control" name="idfacultad" placeholder="Buscar por Facultad ID...">

            <span class="input-group-btn">
                <button class="btn btn-default-sm" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </form>

    <table class="table table-hover">
        <tr>
            <th>No</th>
            <th>Facultad</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th width="280px">Accion</th>
        </tr>
        <tbody>
        @foreach ($encuestas as $key => $encuesta)
            <tr>
                <td class="table-text">
                    {{$encuesta->id}}
                </td>

                <td class="table-text">
                    {{\App\Facultad::findOrFail($encuesta->idfacultad)->descripcion}}
                </td>

                <td class="table-text">
                    {{$encuesta->fechainicio}}
                </td>

                <td class="table-text">
                    {{$encuesta->fechafin}}
                </td>
                <td>
                    <a href="{{ url('/admin/gestionarresultado/'. $encuesta->id)}}" class="btn btn-info btn-round">Ver Usuarios</a>
                    <a href="{{ url('/admin/gestionargrafico/si/'. $encuesta->id)}}" class="btn btn-info btn-round">Ver Respuestas Positivas</a>
                    <a href="{{ url('/admin/gestionargrafico/no/'. $encuesta->id)}}" class="btn btn-info btn-round">Ver Respuestas Negativas</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $encuestas->render() !!}

@endsection