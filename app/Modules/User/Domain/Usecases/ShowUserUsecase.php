<?php

namespace App\Modules\User\Domain\Usecases;

use App\Utils\Entities\Responses\ResponseEntity;
use App\Modules\User\Domain\Repository\IUserRepository;

class ShowUserUsecase
{
    private IUserRepository $repository;

    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id): ResponseEntity
    {
        return $this->repository->show($id);
    }
}
