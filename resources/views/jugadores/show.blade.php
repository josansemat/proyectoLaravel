@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Detalles del Jugador</h1>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Nombre:</div>
                <div class="col-md-9">{{ $jugador->nombre }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Edad:</div>
                <div class="col-md-9">{{ $jugador->edad }} años</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Posición:</div>
                <div class="col-md-9">{{ $jugador->posicion }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Equipo:</div>
                <div class="col-md-9">{{ $jugador->equipo->nombre }}</div>
            </div>
            <div class="mt-4">
                <a href="{{ route('jugadores.edit', $jugador->id) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('jugadores.index') }}" class="btn btn-secondary">Volver a la lista</a>
                <form action="{{ route('jugadores.destroy', $jugador->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este jugador?')">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endsection 