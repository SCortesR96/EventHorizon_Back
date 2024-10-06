<?php

namespace App\Http\Requests\Booking\PlanProduct;

use Illuminate\Foundation\Http\FormRequest;

class PlanProductUpdateRequest extends FormRequest
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
            'name'          => 'required|string|max:70|unique:plan_products,name,' . $this->route('id'),
            'description'   => 'nullable|string|max:255',
        ];
    }
}
