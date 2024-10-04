<?php

namespace App\Modules\User\Domain\Usecases;

use App\Config\Usecase;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Modules\User\Domain\Repository\IUserRepository;

class IndexUserUsecase extends Usecase
{
    private IUserRepository $repository;

    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute($params = null): ResourceCollection
    {
        return $this->repository->index();
    }
}
