<?php

namespace Database\Factories\Location;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'          => $this->faker->word(1),
            'description'   => $this->faker->sentence(),
            'address'       => $this->faker->address(),
            'postal_code'   => $this->faker->postcode(),
            'country'       => $this->faker->country(),
            'state'         => $this->faker->city(),
            'city'          => $this->faker->city(),
        ];
    }
}
