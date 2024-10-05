<?php

namespace Database\Factories\Booking;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'          => $this->faker->unique()->word(),
            'title'         => $this->faker->unique()->words(3, true),
            'description'   => $this->faker->sentence(),
        ];
    }
}
