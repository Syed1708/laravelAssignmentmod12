<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bus>
 */
class BusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'bus_number' => $this->faker->unique()->numberBetween(10000,200000),
            'departure_from' => $this->faker->city,
            'arrival_to' => $this->faker->city,
            'date' => $this->faker->date,
            'time' => $this->faker->time,
            'duration' => $this->faker->numberBetween(6,10),
            'price' => $this->faker->numberBetween(50, 100),
            'seats' => $this->faker->numberBetween(36,40),
        ];
    }
}
