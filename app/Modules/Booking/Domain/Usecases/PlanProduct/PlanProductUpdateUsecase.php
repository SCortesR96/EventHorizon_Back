<?php

namespace App\Modules\Booking\Domain\Usecases\PlanProduct;

use App\Utils\Entities\Responses\ResponseEntity;
use App\Modules\Booking\Domain\Repository\IPlanProductRepository;
use App\Modules\Booking\Data\Entities\PlanProduct\PlanProductUpdateEntity;

class PlanProductUpdateUsecase
{
    private IPlanProductRepository $repository;

    public function __construct(IPlanProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(PlanProductUpdateEntity $entity, int $id): ResponseEntity
    {
        return $this->repository->update($entity, $id);
    }
}
