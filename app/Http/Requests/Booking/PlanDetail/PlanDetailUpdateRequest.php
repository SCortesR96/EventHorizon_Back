<?php

namespace App\Http\Requests\Booking\PlanDetail;

use Illuminate\Foundation\Http\FormRequest;

class PlanDetailUpdateRequest extends FormRequest
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
            'price'       => 'required|numeric|min:0|max:99999999.99',
            'description' => 'nullable|string',
            'plan_id'     => 'required|exists:plans,id',
        ];
    }
}
