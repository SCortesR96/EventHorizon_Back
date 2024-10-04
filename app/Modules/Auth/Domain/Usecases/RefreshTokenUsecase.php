<?php

namespace App\Modules\Auth\Domain\Usecases;

use App\Modules\Auth\Data\Repository\AuthRepository;
use App\Modules\Auth\Domain\Responses\SignInResponse;

class RefreshTokenUsecase
{
    private $repository;

    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute($params = null): SignInResponse
    {
        return $this->repository->refreshToken();
    }
}
