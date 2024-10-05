<?php

namespace App\Modules\Booking\Domain\Usecases\Plan;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Modules\Booking\Domain\Repository\IPlanRepository;

class PlanIndexUsecase
{
    private IPlanRepository $repository;

    public function __construct(IPlanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(): ResourceCollection
    {
        return $this->repository->index();
    }
}
