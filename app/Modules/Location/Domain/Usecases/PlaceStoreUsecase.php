<?php

namespace App\Modules\Location\Domain\Usecases;

use App\Modules\Location\Data\Entities\PlaceStoreEntity;
use App\Modules\Location\Domain\Repository\IPlaceRepository;

class PlaceStoreUsecase
{
    private IPlaceRepository $repository;

    public function __construct(IPlaceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(PlaceStoreEntity $entity): bool
    {
        return $this->repository->store($entity);
    }
}
