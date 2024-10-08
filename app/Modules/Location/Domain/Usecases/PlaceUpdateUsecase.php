<?php

namespace App\Modules\Location\Domain\Usecases;

use App\Utils\Entities\Responses\ResponseEntity;
use App\Modules\Location\Data\Entities\PlaceUpdateEntity;
use App\Modules\Location\Domain\Repository\IPlaceRepository;

class PlaceUpdateUsecase
{
    private IPlaceRepository $repository;

    public function __construct(IPlaceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(PlaceUpdateEntity $entity, int $id): ResponseEntity
    {
        return $this->repository->update($entity, $id);
    }
}
