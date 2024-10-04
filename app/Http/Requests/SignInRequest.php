<?php

namespace App\Http\Requests;

use App\Traits\RequestResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class SignInRequest extends FormRequest
{
    use RequestResponse;

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
            'email'     => 'required|email|exists:users,email',
            'password'  => 'required|string|min:8'
        ];
    }

    /**
     * It throws a ValidationException with a custom response
     *
     * @param Validator validator The validator instance.
     */
    protected function failedValidation(Validator $validator)
    {
        $this->response($validator);
    }
}
