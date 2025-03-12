@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Editar Equipo</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('equipos.update', $equipo->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $equipo->nombre) }}" required>
                    @error('nombre')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" name="ciudad" id="ciudad" class="form-control @error('ciudad') is-invalid @enderror" value="{{ old('ciudad', $equipo->ciudad) }}" required>
                    @error('ciudad')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection 