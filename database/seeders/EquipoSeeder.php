<?php

namespace Database\Seeders;

use App\Models\Equipo;
use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipos = [
            ['nombre' => 'FC Barcelona', 'ciudad' => 'Barcelona'],
            ['nombre' => 'Real Madrid', 'ciudad' => 'Madrid'],
            ['nombre' => 'Atlético de Madrid', 'ciudad' => 'Madrid'],
            ['nombre' => 'Valencia CF', 'ciudad' => 'Valencia'],
            ['nombre' => 'Sevilla FC', 'ciudad' => 'Sevilla']
        ];

        foreach ($equipos as $equipo) {
            Equipo::create($equipo);
        }
    }
} 