<?php

namespace Database\Seeders\Booking;

use App\Models\Booking\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::factory(100)->create();
    }
}
