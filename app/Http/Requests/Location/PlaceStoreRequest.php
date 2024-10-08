<?php

namespace App\Http\Requests\Location;

use Illuminate\Foundation\Http\FormRequest;

class PlaceStoreRequest extends FormRequest
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
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string|max:500',
            'address'       => 'required|string|max:255',
            'postalCode'    => 'required|string|max:20',
            'country'       => 'required|string|max:100',
            'state'         => 'required|string|max:100',
            'city'          => 'required|string|max:100',
        ];
    }
}
