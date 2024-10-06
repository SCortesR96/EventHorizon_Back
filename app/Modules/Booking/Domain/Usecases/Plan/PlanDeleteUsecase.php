<?php

namespace App\Modules\Booking\Domain\Usecases\Plan;

use App\Utils\Entities\Responses\ResponseEntity;
use App\Modules\Booking\Domain\Repository\IPlanRepository;

class PlanDeleteUsecase
{
    private IPlanRepository $repository;

    public function __construct(IPlanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): ResponseEntity
    {
        return $this->repository->delete($id);
    }
}
