<?php

namespace App\Modules\User\Domain\Usecases;

use App\Modules\User\Domain\Repository\IUserRepository;

class UpdateUserUsecase
{
    private IUserRepository $repository;

    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute($params)
    {
        return $this->repository->update($params[0], $params[1]);
    }
}
