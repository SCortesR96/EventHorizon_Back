<?php

namespace App\Modules\User\Data\Services;

use Exception;
use App\Models\User;
use App\Http\Resources\User\UserResource;
use App\Utils\Entities\Responses\ResponseEntity;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Modules\User\Data\Entities\{
    UserUpdateEntity,
    UserStoreEntity
};
use App\Utils\Services\UserUtil;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function index(): ResourceCollection
    {
        return UserResource::collection(
            User::orderBy('first_name', 'ASC')->get()
        );
    }

    public function show(int $id): ResponseEntity
    {
        return UserUtil::find($id);
    }

    public function store(UserStoreEntity $entity)
    {
        $user                    = new User();
        $user->avatar            = $entity->avatar;
        $user->username          = $entity->username;
        $user->first_name        = $entity->first_name;
        $user->second_name       = $entity->second_name;
        $user->first_lastname    = $entity->first_lastname;
        $user->second_lastname   = $entity->second_lastname;
        $user->document_type_id  = $entity->document_type_id;
        $user->document          = $entity->document;
        $user->gender_id         = $entity->gender_id;
        $user->phone_country     = $entity->phone_country;
        $user->phone             = $entity->phone;
        $user->birthdate         = $entity->birthdate;
        $user->email             = $entity->email;
        $user->password          = $entity->password;
        $user->enabled           = true;

        if ($user->save()) {
            return true;
        }

        throw new \Exception(__('responses.error.saved'));
    }


    public function update(UserUpdateEntity $entity, int $id): ResponseEntity
    {
        $response = new ResponseEntity(__('responses.error.deleted'), false, 500);
        $userData = UserUtil::find($id);

        if (!$userData->isSuccess) return $userData;

        $user                   = User::find($id);;
        $user->avatar           = $entity->avatar;
        $user->first_name       = $entity->first_name;
        $user->second_name      = $entity->second_name;
        $user->first_lastname   = $entity->first_lastname;
        $user->second_lastname  = $entity->second_lastname;
        $user->gender_id        = $entity->gender_id;
        $user->phone_country    = $entity->phone_country;
        $user->phone            = $entity->phone;
        $user->enabled          = $entity->enabled;

        if ($user->save()) {
            $response->response     = __('responses.success.updated');
            $response->isSuccess    = true;
            $response->code         = 201;
            return $response;
        }
        return $response;
    }

    public function delete(int $id)
    {
        $response = new ResponseEntity(__('responses.error.deleted'), false, 500);
        $userData = UserUtil::find($id);

        if (!$userData->isSuccess) return $userData;
        $user = $userData->data;
        if ($user->delete()) {
            $response->response     = __('responses.success.deleted');
            $response->isSuccess    = true;
            $response->code         = 200;
            return $response;
        }
        return $response;
    }
}
