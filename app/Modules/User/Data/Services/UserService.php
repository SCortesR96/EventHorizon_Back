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

class UserService
{
    public function index(): ResourceCollection
    {
        return UserResource::collection(
            User::orderBy('name', 'ASC')->get()
        );
    }

    public function show(int $id): ResponseEntity
    {
        throw new Exception('');
    }

    public function store(UserStoreEntity $entity)
    {
        $user = new User();

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
        $user->deleted           = false;

        if ($user->save()) {
            return true;
        }

        throw new \Exception(__('responses.error.saved'));
    }


    public function update(UserUpdateEntity $user, int $id)
    {
        throw new Exception('');
    }

    public function delete(int $id): ResponseEntity
    {
        throw new Exception('');
    }
}
