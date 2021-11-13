<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'genero' => Arr::random(['femenino', 'masculino', 'otro']),
            'fecha_nacimiento' => $this->faker->dateTimeBetween('-40 years', '-15 years')->format('Y-m-d'),
        ];
    }
}
