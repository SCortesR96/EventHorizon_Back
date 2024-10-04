<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'avatar'            => 'nullable|string|max:255',
            'username'          => 'required|string|max:255',
            'first_name'        => 'required|string|max:255',
            'second_name'       => 'nullable|string|max:255',
            'first_lastname'    => 'required|string|max:255',
            'second_lastname'   => 'required|string|max:255',
            'document'          => 'required|string|unique:users,document,id',
            'document_type_id'  => 'required|numeric|exists:document_types,id',
            'gender_id'         => 'required|numeric|exists:genders,id',
            'phone_country'     => 'required|string|max:5',
            'phone'             => 'required|string|max:15',
            'email'             => 'required|string|email|unique:users,email',
            'birthdate'         => 'required|date_format:Y/m/d',
            'password'          => 'required|string|confirmed|min:8'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'first_name'        => 'first name',
            'second_name'       => 'second name',
            'first_lastname'    => 'first lastname',
            'second_lastname'   => 'second lastname',
            'document_type_id'  => 'document type',
            'gender_id'         => 'gender',
            'phone_country'     => 'phone country code',
            'phone'             => 'phone number',
        ];
    }
}
