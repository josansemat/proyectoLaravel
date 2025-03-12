@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Añadir Nuevo Jugador</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('jugadores.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required>
                    @error('nombre')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="edad">Edad:</label>
                    <input type="number" name="edad" id="edad" class="form-control @error('edad') is-invalid @enderror" value="{{ old('edad') }}" required min="16">
                    @error('edad')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="posicion">Posición:</label>
                    <select name="posicion" id="posicion" class="form-control @error('posicion') is-invalid @enderror" required>
                        <option value="">Selecciona una posición</option>
                        <option value="Portero" {{ old('posicion') == 'Portero' ? 'selected' : '' }}>Portero</option>
                        <option value="Defensa" {{ old('posicion') == 'Defensa' ? 'selected' : '' }}>Defensa</option>
                        <option value="Centrocampista" {{ old('posicion') == 'Centrocampista' ? 'selected' : '' }}>Centrocampista</option>
                        <option value="Delantero" {{ old('posicion') == 'Delantero' ? 'selected' : '' }}>Delantero</option>
                    </select>
                    @error('posicion')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="equipo_id">Equipo:</label>
                    <select name="equipo_id" id="equipo_id" class="form-control @error('equipo_id') is-invalid @enderror" required>
                        <option value="">Selecciona un equipo</option>
                        @foreach($equipos as $equipo)
                            <option value="{{ $equipo->id }}" {{ old('equipo_id') == $equipo->id ? 'selected' : '' }}>
                                {{ $equipo->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('equipo_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="{{ route('jugadores.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection 