<?php

namespace Database\Factories;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    return [
        'autor_id' => \App\Models\Autor::factory(),
        'titulo' => $this->faker->text(100),
        'isbn' => $this->faker->unique()->isbn13,
        'anio_publicacion' => $this->faker->numberBetween(1900, date('Y')),
        'precio' => $this->faker->randomFloat(2, 5, 150),
    ];
    }

}
