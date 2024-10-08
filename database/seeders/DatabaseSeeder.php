<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\Booking\{
    BookingSeeder,
    BookingStatusSeeder,
    PlanSeeder,
    PlanDetailSeeder,
    PlanProductSeeder,
    PlanDetailPlanProductSeeder,
};
use Database\Seeders\Location\PlaceSeeder;
use Database\Seeders\Location\PlaceStatusSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DocumentTypeSeeder::class,
            GenderSeeder::class,
        ]);

        User::factory(10)->create();

        // BOOKING MODULE
        $this->call([
            PlanSeeder::class,
            BookingStatusSeeder::class,
            BookingSeeder::class,
            PlanDetailSeeder::class,
            PlanProductSeeder::class,
            PlanDetailPlanProductSeeder::class,
        ]);

        // LOCATION MODULE
        $this->call([
            PlaceSeeder::class,
            PlaceStatusSeeder::class,
        ]);
    }
}
