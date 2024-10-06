<?php

namespace App\Modules\Booking\Data\Repository;

use App\Utils\Entities\Pagination\PaginationEntity;
use App\Modules\Booking\Data\Services\PlanDetailService;
use App\Modules\Booking\Domain\Repository\IPlanDetailRepository;
use App\Utils\Entities\Responses\{
    ResponseEntity,
    PaginationResponseEntity,
};
use App\Modules\Booking\Data\Entities\PlanDetail\{
    PlanDetailStoreEntity,
    PlanDetailUpdateEntity
};

class PlanDetailRepository extends IPlanDetailRepository
{
    private PlanDetailService $planDetailService;

    public function __construct(PlanDetailService $planDetailService)
    {
        $this->planDetailService = $planDetailService;
    }

    public function index(PaginationEntity $pagination): PaginationResponseEntity
    {
        return $this->planDetailService->index($pagination);
    }

    public function show(int $id): ResponseEntity
    {
        return $this->planDetailService->show($id);
    }

    public function store(PlanDetailStoreEntity $entity): bool
    {
        return $this->planDetailService->store($entity);
    }

    public function update(PlanDetailUpdateEntity $entity, int $id): ResponseEntity
    {
        return $this->planDetailService->update($entity, $id);
    }

    public function delete(int $id): ResponseEntity
    {
        return $this->planDetailService->delete($id);
    }
}
