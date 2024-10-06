<?php

namespace App\Modules\Booking\Domain\Usecases\PlanProduct;

use App\Modules\Booking\Domain\Repository\IPlanProductRepository;
use App\Modules\Booking\Data\Entities\PlanProduct\PlanProductStoreEntity;

class PlanProductStoreUsecase
{
    private IPlanProductRepository $repository;

    public function __construct(IPlanProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(PlanProductStoreEntity $entity): bool
    {
        return $this->repository->store($entity);
    }
}
