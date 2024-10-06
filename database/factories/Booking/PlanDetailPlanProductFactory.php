<?php

namespace Database\Factories\Booking;

use App\Models\Booking\PlanDetail;
use App\Models\Booking\PlanProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking\PlanDetailPlanProduct>
 */
class PlanDetailPlanProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plan_detail_id'    => PlanDetail::inRandomOrder()->first()->id,
            'plan_product_id'   => PlanProduct::inRandomOrder()->first()->id,
            'quantity'          => $this->faker->randomNumber(3)
        ];
    }
}
