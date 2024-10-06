<?php

namespace App\Modules\Booking\Data\Entities\Booking;

use Illuminate\Http\Request;

class BookingUpdateEntity
{
    public string $city;
    public string $start_at;
    public string $end_at;
    public string $plan_id;
    public string $user_id;
    public string $booking_status_id;

    public function __construct(Request $request)
    {
        $this->city                 = $request->city;
        $this->start_at             = $request->startAt;
        $this->end_at               = $request->endAt;
        $this->plan_id              = $request->plan;
        $this->user_id              = $request->user;
        $this->booking_status_id    = $request->bookingStatus;
    }

    public function toArray()
    {
        return [
            'city'              => $this->city,
            'start_at'          => $this->start_at,
            'end_at'            => $this->end_at,
            'plan_id'           => $this->plan_id,
            'user_id'           => $this->user_id,
            'booking_status_id' => $this->booking_status_id,
        ];
    }
}
