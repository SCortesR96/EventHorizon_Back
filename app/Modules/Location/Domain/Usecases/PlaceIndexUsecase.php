<?php

namespace App\Modules\Location\Domain\Usecases;

use App\Utils\Entities\Pagination\PaginationEntity;
use App\Modules\Location\Domain\Repository\IPlaceRepository;
use App\Utils\Entities\Responses\PaginationResponseEntity;

class PlaceIndexUsecase
{
    private IPlaceRepository $repository;

    public function __construct(IPlaceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(PaginationEntity $pagination): PaginationResponseEntity
    {
        return $this->repository->index($pagination);
    }
}
