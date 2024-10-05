<?php

namespace App\Modules\Booking\Domain\Repository;

use App\Modules\Booking\Data\Entities\PlanStoreEntity;
use App\Modules\Booking\Data\Entities\PlanUpdateEntity;
use App\Utils\Entities\Responses\ResponseEntity;
use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class IPlanRepository
{
    public abstract function index(): ResourceCollection;
    public abstract function show(int $id): ResponseEntity;
    public abstract function store(PlanStoreEntity $entity): bool;
    public abstract function update(PlanUpdateEntity $entity, int $id): ResponseEntity;
    public abstract function delete(int $id): ResponseEntity;
};
