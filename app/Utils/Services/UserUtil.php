<?php

namespace App\Utils\Services;

use App\Models\User;
use App\Http\Resources\User\UserResource;
use App\Utils\Entities\Responses\ResponseEntity;

class UserUtil
{
    public static function find(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return new ResponseEntity(
                __('responses.error.notFound'),
                false,
                404,
            );
        }

        if (!$user->enabled) {
            return new ResponseEntity(
                __('responses.error.temporarilyUnavailable'),
                false,
                400,
            );
        }

        return new ResponseEntity(
            __('responses.success.load'),
            true,
            200,
            UserResource::make($user),
        );
    }
}
