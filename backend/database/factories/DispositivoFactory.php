<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Bodega;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dispositivo>
 */
class DispositivoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => strtoupper(fake()->bothify('??-###')),
            'bodega_id' => Bodega::inRandomOrder()->first()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
    }
}
