<?php

namespace Database\Factories\Booking;

use App\Models\Booking\BookingStatus;
use App\Models\Booking\Plan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city'              => $this->faker->word(2),
            'start_at'          => $this->faker->dateTime(),
            'end_at'            => $this->faker->dateTime(),
            'user_id'           => User::inRandomOrder()->first()->id,
            'plan_id'           => Plan::inRandomOrder()->first()->id,
            'booking_status_id' => BookingStatus::inRandomOrder()->first()->id,
        ];
    }
}
