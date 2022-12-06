<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PokemonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_energy' => $this->faker->unique()->randomDigit,
            'name' => $this->faker->unique()->word, // A single unique word
            'pv_max' => $this->faker->unique()->randomDigit, // A single unique word
            'level' => $this->faker->unique()->randomDigit, // A single unique word
            'path' => $this->faker->unique()->word // A single unique word
        ];
    }
}