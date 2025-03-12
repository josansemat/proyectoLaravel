<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipos = Equipo::paginate(10);
        return view('equipos.index', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'ciudad' => 'required|max:100',
        ]);
        
        Equipo::create($request->all());
        return redirect()->route('equipos.index')->with('success', 'Equipo creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $equipo = Equipo::with('jugadores')->findOrFail($id);
        return view('equipos.show', compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $equipo = Equipo::findOrFail($id);
        return view('equipos.edit', compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $equipo = Equipo::findOrFail($id);
        
        $request->validate([
            'nombre' => 'required|max:100',
            'ciudad' => 'required|max:100',
        ]);
        
        $equipo->update($request->all());
        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $equipo = Equipo::findOrFail($id);
        // Verificar si tiene jugadores
        if($equipo->jugadores()->count() > 0) {
            return redirect()->route('equipos.index')->with('error', 'No se puede eliminar el equipo porque tiene jugadores asociados');
        }
        
        $equipo->delete();
        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado correctamente');
    }
}
