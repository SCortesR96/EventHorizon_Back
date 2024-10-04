<?php

namespace App\Modules\User\Data\Repository;

use Exception;
use App\Modules\User\Data\Services\UserService;
use App\Utils\Entities\Responses\ResponseEntity;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Modules\User\Domain\Repository\IUserRepository;
use App\Modules\User\Data\Entities\{
    UserUpdateEntity,
    UserStoreEntity
};

class UserRepository extends IUserRepository
{
    private UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(): ResourceCollection
    {
        return $this->service->index();
    }

    public function show(int $id): ResponseEntity
    {
        return $this->service->show($id);
    }

    public function store(UserStoreEntity $user)
    {
        return $this->service->store($user);
    }

    public function update(UserUpdateEntity $user, int $id)
    {
        return $this->service->update($user, $id);
    }

    public function delete(int $id)
    {
        return $this->service->delete($id);
    }
}
