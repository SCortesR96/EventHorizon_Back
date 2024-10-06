<?php

namespace App\Modules\Booking\Domain\Usecases\PlanProduct;

use App\Utils\Entities\Pagination\PaginationEntity;
use App\Utils\Entities\Responses\PaginationResponseEntity;
use App\Modules\Booking\Domain\Repository\IPlanProductRepository;

class PlanProductIndexUsecase
{
    private IPlanProductRepository $repository;

    public function __construct(IPlanProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(PaginationEntity $pagination): PaginationResponseEntity
    {
        return $this->repository->index($pagination);
    }
}
