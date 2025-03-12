<?php

namespace App\Http\Controllers;

use App\Models\Jugador; // Importar el modelo Jugador
use App\Models\Equipo; // Importar el modelo Equipo para los formularios
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jugadores = Jugador::with('equipo')->paginate(10);
        return view('jugadores.index', compact('jugadores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipos = Equipo::all();
        return view('jugadores.create', compact('equipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'edad' => 'required|integer|min:16',
            'posicion' => 'required',
            'equipo_id' => 'required|exists:equipos,id'
        ]);
        Jugador::create($request->all());
        return redirect()->route('jugadores.index')->with('success', 'Jugador creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jugador = Jugador::with('equipo')->findOrFail($id);
        return view('jugadores.show', compact('jugador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jugador = Jugador::findOrFail($id);
        $equipos = Equipo::all();
        return view('jugadores.edit', compact('jugador', 'equipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jugador = Jugador::findOrFail($id);
        
        $request->validate([
            'nombre' => 'required|max:100',
            'edad' => 'required|integer|min:16',
            'posicion' => 'required',
            'equipo_id' => 'required|exists:equipos,id'
        ]);
        
        $jugador->update($request->all());
        return redirect()->route('jugadores.index')->with('success', 'Jugador actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jugador = Jugador::findOrFail($id);
        $jugador->delete();
        return redirect()->route('jugadores.index')->with('success', 'Jugador eliminado correctamente');
    }
}