<?php

namespace App\Modules\Location\Domain\Repository;

use App\Utils\Entities\Pagination\PaginationEntity;
use App\Utils\Entities\Responses\{
    PaginationResponseEntity,
    ResponseEntity
};
use App\Modules\Location\Data\Entities\{
    PlaceStoreEntity,
    PlaceUpdateEntity
};

abstract class IPlaceRepository
{
    public abstract function index(PaginationEntity $pagination): PaginationResponseEntity;
    public abstract function show(int $id): ResponseEntity;
    public abstract function store(PlaceStoreEntity $entity): bool;
    public abstract function update(PlaceUpdateEntity $entity, int $id): ResponseEntity;
    public abstract function delete(int $id): ResponseEntity;
}
