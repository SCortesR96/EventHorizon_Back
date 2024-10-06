<?php

namespace App\Modules\Booking\Data\Repository;

use App\Utils\Entities\Pagination\PaginationEntity;
use App\Modules\Booking\Data\Services\PlanProductService;
use App\Modules\Booking\Domain\Repository\IPlanProductRepository;
use App\Utils\Entities\Responses\{
    ResponseEntity,
    PaginationResponseEntity,
};
use App\Modules\Booking\Data\Entities\PlanProduct\{
    PlanProductStoreEntity,
    PlanProductUpdateEntity
};

class PlanProductRepository extends IPlanProductRepository
{
    private PlanProductService $planProductService;

    public function __construct(PlanProductService $planProductService)
    {
        $this->planProductService = $planProductService;
    }

    public function index(PaginationEntity $pagination): PaginationResponseEntity
    {
        return $this->planProductService->index($pagination);
    }

    public function show(int $id): ResponseEntity
    {
        return $this->planProductService->show($id);
    }

    public function store(PlanProductStoreEntity $entity): bool
    {
        return $this->planProductService->store($entity);
    }

    public function update(PlanProductUpdateEntity $entity, int $id): ResponseEntity
    {
        return $this->planProductService->update($entity, $id);
    }

    public function delete(int $id): ResponseEntity
    {
        return $this->planProductService->delete($id);
    }
}
