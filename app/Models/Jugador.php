<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;
    
    // Especificar el nombre de la tabla
    protected $table = 'jugadores';
    
    protected $fillable = ['nombre', 'edad', 'posicion', 'equipo_id'];
    
    public function equipo() {
        return $this->belongsTo(Equipo::class);
    }
}
