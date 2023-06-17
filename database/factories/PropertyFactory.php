<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $rooms = $this->faker->numberBetween(1, 10);
        return [
            'title' => $this->faker->title,
            'descreption' => $this->faker->sentences(4,true),
            'adress' => $this->faker->address,
            'surface' => $this->faker->numberBetween(50, 500),
            'rooms' => $this->faker->numberBetween(1, $rooms),
            'bedrooms' => $this->faker->numberBetween(1, $rooms - 1),
            'floor' => $this->faker->numberBetween(0, 50),
            'price' => $this->faker->numberBetween(1000000, 10000000),
            'sold' => false,
        ];
    }

}
