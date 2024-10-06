<?php

namespace App\Modules\Booking\Domain\Usecases\Plan;

use App\Utils\Entities\Responses\ResponseEntity;
use App\Modules\Booking\Domain\Repository\IPlanRepository;
use App\Modules\Booking\Data\Entities\Plan\PlanUpdateEntity;

class PlanUpdateUsecase
{
    private IPlanRepository $repository;

    public function __construct(IPlanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(PlanUpdateEntity $entity, int $id): ResponseEntity
    {
        return $this->repository->update($entity, $id);
    }
}
