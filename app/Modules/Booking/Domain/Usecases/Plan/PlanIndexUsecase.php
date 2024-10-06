<?php

namespace App\Modules\Booking\Domain\Usecases\Plan;

use App\Utils\Entities\Pagination\PaginationEntity;
use App\Modules\Booking\Domain\Repository\IPlanRepository;
use App\Utils\Entities\Responses\PaginationResponseEntity;

class PlanIndexUsecase
{
    private IPlanRepository $repository;

    public function __construct(IPlanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(PaginationEntity $pagination): PaginationResponseEntity
    {
        return $this->repository->index($pagination);
    }
}
