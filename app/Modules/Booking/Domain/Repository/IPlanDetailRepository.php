<?php

namespace App\Modules\Booking\Domain\Repository;

use App\Utils\Entities\Pagination\PaginationEntity;
use App\Utils\Entities\Responses\{
    ResponseEntity,
    PaginationResponseEntity,
};
use App\Modules\Booking\Data\Entities\PlanDetail\{
    PlanDetailStoreEntity,
    PlanDetailUpdateEntity,
};

abstract class IPlanDetailRepository
{
    public abstract function index(PaginationEntity $pagination): PaginationResponseEntity;
    public abstract function show(int $id): ResponseEntity;
    public abstract function store(PlanDetailStoreEntity $entity): bool;
    public abstract function update(PlanDetailUpdateEntity $entity, int $id): ResponseEntity;
    public abstract function delete(int $id): ResponseEntity;
}
