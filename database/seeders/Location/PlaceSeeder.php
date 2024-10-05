<?php

namespace Database\Seeders\Location;

use App\Models\Location\Place;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Place::factory(40)->create();
    }
}
