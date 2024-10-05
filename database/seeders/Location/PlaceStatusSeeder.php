<?php

namespace Database\Seeders\Location;

use Illuminate\Database\Seeder;
use App\Models\Location\PlaceStatus;

class PlaceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PlaceStatus::insert([
            [
                'name'          => 'available',
                'display_name'  => 'Available',
                'description'   => 'The place is available for reservations and usage.'
            ],
            [
                'name'          => 'under-maintenance',
                'display_name'  => 'Under Maintenance',
                'description'   => 'The place is temporarily closed due to maintenance work.'
            ],
            [
                'name'          => 'closed',
                'display_name'  => 'Closed',
                'description'   => 'The place is closed and not available for reservations.'
            ],
            [
                'name'          => 'out-of-service',
                'display_name'  => 'Out of Service',
                'description'   => 'The place is out of service and cannot be reserved or used.'
            ]
        ]);
    }
}
