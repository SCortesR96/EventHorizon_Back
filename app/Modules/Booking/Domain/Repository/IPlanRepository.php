<?php

namespace App\Modules\Booking\Domain\Repository;

use App\Utils\Entities\Responses\ResponseEntity;
use App\Utils\Entities\Pagination\PaginationEntity;
use App\Utils\Entities\Responses\PaginationResponseEntity;
use App\Modules\Booking\Data\Entities\Plan\{
    PlanUpdateEntity,
    PlanStoreEntity
};

abstract class IPlanRepository
{
    public abstract function index(PaginationEntity $pagination): PaginationResponseEntity;
    public abstract function show(int $id): ResponseEntity;
    public abstract function store(PlanStoreEntity $entity): bool;
    public abstract function update(PlanUpdateEntity $entity, int $id): ResponseEntity;
    public abstract function delete(int $id): ResponseEntity;
};
