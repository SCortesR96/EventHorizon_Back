<?php

namespace App\Traits;

use App\Enums\ApiStatusEnum;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

trait RequestResponse
{
    function response(Validator $validator): JsonResponse
    {
        $response = response()->json(
            [
                'status'    => ApiStatusEnum::ERROR,
                'message'   => __('responses.error.verifyData'),
                'data'      => $validator->errors()->all()
            ],
            JsonResponse::HTTP_BAD_REQUEST,
            ['Content-Type' => 'application/json']
        );

        throw new ValidationException($validator, $response);
    }
}
