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

    public function store(UserStoreEntity $user)
    {
        throw new Exception('');
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
