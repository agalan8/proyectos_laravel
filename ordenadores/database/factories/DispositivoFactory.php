<?php

namespace Database\Factories;

use App\Models\Aula;
use App\Models\Ordenador;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $colocable_type = fake()->randomElement([Ordenador::class, Aula::class]);
        return [
            'nombre' => fake()->name(),
            'colocable_id' => $colocable_type::factory()->create()->id,
            'colocable_type' => $colocable_type,
            // 'colocable_type' => 'App\Models\Ordenador',
            // 'colocable_id' => Ordenador::inRandomOrder()->first()->id,
        ];
    }
}
