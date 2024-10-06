<?php

namespace App\Modules\Booking\Domain\Usecases\Plan;

use App\Modules\Booking\Data\Entities\Plan\PlanStoreEntity;
use App\Modules\Booking\Domain\Repository\IPlanRepository;

class PlanStoreUsecase
{
    private IPlanRepository $repository;

    public function __construct(IPlanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(PlanStoreEntity $entity): bool
    {
        return $this->repository->store($entity);
    }
}
