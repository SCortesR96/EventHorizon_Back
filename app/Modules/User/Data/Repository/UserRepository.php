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
