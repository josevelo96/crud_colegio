<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grado;
use App\Models\Profesor;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach([1, 2, 3, 4, 5] as $numero) {
            Grado::create([
                'profesor_id' => Profesor::limit(10)->get()->random()->id,
                'nombre' => "Grado {$numero}"
            ]);
        }
    }
}
