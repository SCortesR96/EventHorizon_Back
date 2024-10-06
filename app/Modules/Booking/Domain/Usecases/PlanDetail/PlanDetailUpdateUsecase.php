<?php

namespace App\Modules\Booking\Domain\Usecases\PlanDetail;

use App\Utils\Entities\Responses\ResponseEntity;
use App\Modules\Booking\Domain\Repository\IPlanDetailRepository;
use App\Modules\Booking\Data\Entities\PlanDetail\PlanDetailUpdateEntity;

class PlanDetailUpdateUsecase
{
    private IPlanDetailRepository $repository;

    public function __construct(IPlanDetailRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(PlanDetailUpdateEntity $entity, int $id): ResponseEntity
    {
        return $this->repository->update($entity, $id);
    }
}
