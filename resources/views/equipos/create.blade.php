@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Añadir Nuevo Equipo</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('equipos.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required>
                    @error('nombre')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" name="ciudad" id="ciudad" class="form-control @error('ciudad') is-invalid @enderror" value="{{ old('ciudad') }}" required>
                    @error('ciudad')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection 