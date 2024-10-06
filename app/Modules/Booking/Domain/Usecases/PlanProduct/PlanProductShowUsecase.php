<?php

namespace App\Modules\Booking\Domain\Usecases\PlanProduct;

use App\Utils\Entities\Responses\ResponseEntity;
use App\Modules\Booking\Domain\Repository\IPlanProductRepository;

class PlanProductShowUsecase
{
    private IPlanProductRepository $repository;

    public function __construct(IPlanProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): ResponseEntity
    {
        return $this->repository->show($id);
    }
}
