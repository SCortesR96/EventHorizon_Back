<?php

namespace Database\Seeders\Booking;

use Illuminate\Database\Seeder;
use App\Models\Booking\PlanDetail;

class PlanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PlanDetail::factory(10)->create();
    }
}
