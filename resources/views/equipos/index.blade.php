@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Lista de equipos</h1>
            <a href="{{ route('equipos.create') }}" class="btn btn-success">
                <i class="fas fa-plus me-1"></i> Agregar Equipo
            </a>
        </div>
        <div class="card-body">
            @if($equipos->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Ciudad</th>
                                <th>Jugadores</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipos as $equipo)
                                <tr>
                                    <td>{{ $equipo->nombre }}</td>
                                    <td>{{ $equipo->ciudad }}</td>
                                    <td>
                                        <a href="{{ route('equipos.show', $equipo) }}" class="btn btn-sm btn-secondary">
                                            Ver jugadores ({{ $equipo->jugadores()->count() }})
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('equipos.edit', $equipo) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('equipos.destroy', $equipo) }}" style="display:inline">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este equipo? No se podrá eliminar si tiene jugadores asociados.')">
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
                    {{ $equipos->links() }}
                </div>
            @else
                <div class="alert alert-info">
                    No hay equipos registrados. <a href="{{ route('equipos.create') }}" class="alert-link">Agregar el primer equipo</a>
                </div>
            @endif
        </div>
    </div>
@endsection 