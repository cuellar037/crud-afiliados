<?php

namespace Database\Factories;

use App\Models\Afiliado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Afiliado>
 */
class AfiliadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'            => fake()->firstName(),
            'apellido'          => fake()->lastName(),
            'tipo_documento'    => fake()->randomElement(['RC', 'TI','CC','CE' ]),
            'numero_documento'  => fake()->unique()->numerify('##########'),
            'numero_celular'           => fake()->numerify('3#########'), 
            'email'             => fake()->unique()->safeEmail(),
        ];
    }
}
