<?php

namespace App\Modules\Booking\Domain\Usecases\PlanDetail;

use App\Utils\Entities\Responses\ResponseEntity;
use App\Modules\Booking\Domain\Repository\IPlanDetailRepository;

class PlanDetailShowUsecase
{
    private IPlanDetailRepository $repository;

    public function __construct(IPlanDetailRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): ResponseEntity
    {
        return $this->repository->show($id);
    }
}
