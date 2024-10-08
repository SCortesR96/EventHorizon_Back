<?php

namespace App\Modules\Location\Domain\Usecases;

use App\Utils\Entities\Responses\ResponseEntity;
use App\Modules\Location\Domain\Repository\IPlaceRepository;

class PlaceDeleteUsecase
{
    private IPlaceRepository $repository;

    public function __construct(IPlaceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): ResponseEntity
    {
        return $this->repository->delete($id);
    }
}
