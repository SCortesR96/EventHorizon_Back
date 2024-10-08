<?php

namespace App\Modules\Location\Data\Repository;

use App\Utils\Entities\Pagination\PaginationEntity;
use App\Modules\Location\Data\Services\PlaceService;
use App\Modules\Location\Domain\Repository\IPlaceRepository;
use App\Utils\Entities\Responses\{
    PaginationResponseEntity,
    ResponseEntity
};
use App\Modules\Location\Data\Entities\{
    PlaceStoreEntity,
    PlaceUpdateEntity
};

class PlaceRepository extends IPlaceRepository
{
    private PlaceService $planService;

    public function __construct(PlaceService $planService)
    {
        $this->planService = $planService;
    }

    public function index(PaginationEntity $pagination): PaginationResponseEntity
    {
        return $this->planService->index($pagination);
    }

    public function show(int $id): ResponseEntity
    {
        return $this->planService->show($id);
    }

    public function store(PlaceStoreEntity $entity): bool
    {
        return $this->planService->store($entity);
    }

    public function update(PlaceUpdateEntity $entity, int $id): ResponseEntity
    {
        return $this->planService->update($entity, $id);
    }

    public function delete(int $id): ResponseEntity
    {
        return $this->planService->delete($id);
    }
}
