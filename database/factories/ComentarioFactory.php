<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentario>
 */
class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->numberBetween(1, 1000),
            'user_id' => $this->faker->numberBetween(1, 1000),
            'contenido' => fake()->text(),
            'comentable_type' => fake()->text(),
            'comentable_id' => $this->faker->numberBetween(1, 1000),
            'created_at' => fake()->text(),
            'updated_at' => fake()->text(),
        ];
    }
}
