<?php

namespace App\Http\Requests\Booking\Booking;

use Illuminate\Foundation\Http\FormRequest;

class BookingUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'city'          => 'required|string|max:255',
            'startAt'       => 'required|date|after_or_equal:now',
            'endAt'         => 'required|date|after:start_at',
            'user'          => 'required|exists:users,id',
            'plan'          => 'required|exists:plans,id',
            'bookingStatus' => 'required|exists:booking_statuses,id',
        ];
    }
}
