<?php

namespace Database\Seeders\Booking;

use App\Models\Booking\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::factory(80)->create();
    }
}
