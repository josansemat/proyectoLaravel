@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Detalles del Equipo</h1>
            <div>
                <a href="{{ route('equipos.edit', $equipo->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit me-1"></i> Editar
                </a>
                <a href="{{ route('equipos.index') }}" class="btn btn-secondary">
                    <i class="fas fa-list me-1"></i> Volver a la lista
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Nombre:</div>
                <div class="col-md-9">{{ $equipo->nombre }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Ciudad:</div>
                <div class="col-md-9">{{ $equipo->ciudad }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Total de jugadores:</div>
                <div class="col-md-9">{{ $equipo->jugadores->count() }}</div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Jugadores del equipo</h2>
            <a href="{{ route('jugadores.create') }}" class="btn btn-success">
                <i class="fas fa-plus me-1"></i> Agregar Jugador
            </a>
        </div>
        <div class="card-body">
            @if($equipo->jugadores->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th>Posición</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($equipo->jugadores as $jugador)
                                <tr>
                                    <td>{{ $jugador->nombre }}</td>
                                    <td>{{ $jugador->edad }}</td>
                                    <td>{{ $jugador->posicion }}</td>
                                    <td>
                                        <a href="{{ route('jugadores.show', $jugador->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('jugadores.edit', $jugador->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('jugadores.destroy', $jugador->id) }}" style="display:inline">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este jugador?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    Este equipo no tiene jugadores. <a href="{{ route('jugadores.create') }}" class="alert-link">Agregar un jugador</a>
                </div>
            @endif
        </div>
    </div>
@endsection 