<?php

namespace App\Modules\Booking\Domain\Repository;

use App\Utils\Entities\Pagination\PaginationEntity;
use App\Utils\Entities\Responses\{
    PaginationResponseEntity,
    ResponseEntity,
};
use App\Modules\Booking\Data\Entities\PlanProduct\{
    PlanProductStoreEntity,
    PlanProductUpdateEntity,
};

abstract class IPlanProductRepository
{
    public abstract function index(PaginationEntity $pagination): PaginationResponseEntity;
    public abstract function show(int $id): ResponseEntity;
    public abstract function store(PlanProductStoreEntity $entity): bool;
    public abstract function update(PlanProductUpdateEntity $entity, int $id): ResponseEntity;
    public abstract function delete(int $id): ResponseEntity;
}
