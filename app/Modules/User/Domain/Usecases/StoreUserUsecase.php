<?php

namespace App\Modules\User\Domain\Usecases;

use App\Modules\User\Domain\Repository\IUserRepository;

class StoreUserUsecase
{
    private IUserRepository $repository;

    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute($request)
    {
        return $this->repository->store($request);
    }
}
