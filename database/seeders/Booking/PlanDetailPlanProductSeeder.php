<?php

namespace Database\Seeders\Booking;

use App\Models\Booking\PlanDetailPlanProduct;
use Illuminate\Database\Seeder;

class PlanDetailPlanProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PlanDetailPlanProduct::factory(500)->create();
    }
}
