@extends('layouts.app')

@section('content')
    <h1>Lista de jugadores</h1>
    <a href="{{ route('jugadores.create') }}" class="btn btn-success">Agregar Jugador</a>
    <table class="table table-striped">
        <tr><th>Nombre</th><th>Edad</th><th>Posición</th><th>Equipo</th><th>Acciones</th></tr>
        @foreach ($jugadores as $jugador)
            <tr>
                <td>{{ $jugador->nombre }}</td>
                <td>{{ $jugador->edad }}</td>
                <td>{{ $jugador->posicion }}</td>
                <td>{{ $jugador->equipo->nombre }}</td>
                <td>
                    <a href="{{ route('jugadores.edit', $jugador) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form method="POST" action="{{ route('jugadores.destroy', $jugador) }}" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $jugadores->links() }}
@endsection
