<?php

namespace Database\Factories\Booking;

use App\Models\Booking\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking\PlanDetail>
 */
class PlanDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'price'         => $this->faker->randomFloat(2),
            'description'   => $this->faker->paragraph(),
            'plan_id'       => Plan::inRandomOrder()->first()->id
        ];
    }
}
