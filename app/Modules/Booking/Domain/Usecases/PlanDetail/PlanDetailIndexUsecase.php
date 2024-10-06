<?php

namespace App\Modules\Booking\Domain\Usecases\PlanDetail;

use App\Utils\Entities\Pagination\PaginationEntity;
use App\Utils\Entities\Responses\PaginationResponseEntity;
use App\Modules\Booking\Domain\Repository\IPlanDetailRepository;

class PlanDetailIndexUsecase
{
    private IPlanDetailRepository $repository;

    public function __construct(IPlanDetailRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(PaginationEntity $pagination): PaginationResponseEntity
    {
        return $this->repository->index($pagination);
    }
}
