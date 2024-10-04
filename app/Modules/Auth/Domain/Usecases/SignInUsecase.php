<?php

namespace App\Modules\Auth\Domain\Usecases;

use App\Modules\Auth\Data\Entities\SignInEntity;
use App\Modules\Auth\Data\Repository\AuthRepository;
use App\Modules\Auth\Domain\Responses\SignInResponse;

class SignInUsecase
{
    private $repository;

    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(SignInEntity $params): SignInResponse
    {
        return $this->repository->signIn($params);
    }
}
