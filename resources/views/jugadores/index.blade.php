@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Lista de jugadores</h1>
            <a href="{{ route('jugadores.create') }}" class="btn btn-success">
                <i class="fas fa-plus me-1"></i> Agregar Jugador
            </a>
        </div>
        <div class="card-body">
            @if($jugadores->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th>Posición</th>
                                <th>Equipo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jugadores as $jugador)
                                <tr>
                                    <td>{{ $jugador->nombre }}</td>
                                    <td>{{ $jugador->edad }}</td>
                                    <td>{{ $jugador->posicion }}</td>
                                    <td>{{ $jugador->equipo->nombre }}</td>
                                    <td>
                                        <a href="{{ route('jugadores.show', $jugador) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('jugadores.edit', $jugador) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('jugadores.destroy', $jugador) }}" style="display:inline">
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
                <div class="mt-3">
                    {{ $jugadores->links() }}
                </div>
            @else
                <div class="alert alert-info">
                    No hay jugadores registrados. <a href="{{ route('jugadores.create') }}" class="alert-link">Agregar el primer jugador</a>
                </div>
            @endif
        </div>
    </div>
@endsection
