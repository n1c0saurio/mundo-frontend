<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Dispositivo;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas = Marca::all();
        
        /**
         * Ejecuta el seeder solo si no hay elementos en la BB.DD.
         */
        if ($marcas->isEmpty()) {
            Marca::factory(5)
                ->has(Modelo::factory(5)
                    ->has(Dispositivo::factory(3)))
                ->create();
        }
    }
}
