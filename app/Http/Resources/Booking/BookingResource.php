<?php

namespace App\Http\Resources\Booking;

use Illuminate\Http\Request;
use App\Http\Resources\User\UserResource;
use App\Models\Booking\BookingStatus;
use App\Models\Booking\Plan;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $plan = Plan::find($this->plan_id);
        $user = User::find($this->user_id);
        $bookingStatus = BookingStatus::find($this->booking_status_id);

        return [
            'id'            => $this->id,
            'city'          => $this->city,
            'startAt'       => $this->start_at,
            'endAt'         => $this->end_at,
            'plan'          => new PlanResource($plan),
            'user'          => new UserResource($user),
            'bookingStatus' => new BookingStatusResource($bookingStatus),
        ];
    }
}
