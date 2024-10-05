<?php

namespace Database\Seeders\Booking;

use App\Models\Booking\PlanProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PlanProduct::factory(50)->create();
    }
}
