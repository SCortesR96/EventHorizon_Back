<?php

namespace App\Modules\User\Domain\Repository;

use App\Modules\User\Data\Entities\{
    UserStoreEntity,
    UserUpdateEntity
};
use App\Utils\Entities\Responses\ResponseEntity;
use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class IUserRepository
{
    public abstract function index(): ResourceCollection;
    public abstract function show(int $id): ResponseEntity;
    public abstract function store(UserStoreEntity $user);
    public abstract function update(UserUpdateEntity $user, int $id);
    public abstract function delete(int $id): ResponseEntity;
}
