<?php

namespace Database\Seeders\Booking;

use App\Models\Booking\BookingStatus;
use Illuminate\Database\Seeder;

class BookingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookingStatus::insert([
            [
                'name'          => 'pending',
                'display_name'  => 'Pending',
                'description'   => 'The reservation has been created but is not yet confirmed.'
            ],
            [
                'name'          => 'confirmed',
                'display_name'  => 'Confirmed',
                'description'   => 'The reservation has been accepted and is ready to proceed.'
            ],
            [
                'name'          => 'paid',
                'display_name'  => 'Paid',
                'description'   => 'The payment has been completed, and the reservation is effective.'
            ],
            [
                'name'          => 'in-process',
                'display_name'  => 'In Process',
                'description'   => 'The reservation is currently being used or is in progress.'
            ],
            [
                'name'          => 'completed',
                'display_name'  => 'Completed',
                'description'   => 'The reservation has been successfully completed.'
            ],
            [
                'name'          => 'canceled',
                'display_name'  => 'Canceled',
                'description'   => 'The reservation has been canceled by the user or administrator before being used.'
            ],
            [
                'name'          => 'rejected',
                'display_name'  => 'Rejected',
                'description'   => 'The reservation request was rejected at the beginning.'
            ]
        ]);
    }
}
