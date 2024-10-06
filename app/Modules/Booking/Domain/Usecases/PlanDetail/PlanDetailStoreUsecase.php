<?php

namespace App\Modules\Booking\Domain\Usecases\PlanDetail;

use App\Modules\Booking\Domain\Repository\IPlanDetailRepository;
use App\Modules\Booking\Data\Entities\PlanDetail\PlanDetailStoreEntity;

class PlanDetailStoreUsecase
{
    private IPlanDetailRepository $repository;

    public function __construct(IPlanDetailRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(PlanDetailStoreEntity $entity): bool
    {
        return $this->repository->store($entity);
    }
}
