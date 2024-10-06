<?php

namespace App\Modules\Booking\Domain\Usecases\Booking;

use App\Utils\Entities\Pagination\PaginationEntity;
use App\Modules\Booking\Domain\Repository\IBookingRepository;
use App\Utils\Entities\Responses\PaginationResponseEntity;

class BookingIndexUsecase
{
    private IBookingRepository $repository;

    public function __construct(IBookingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(PaginationEntity $pagination): PaginationResponseEntity
    {
        return $this->repository->index($pagination);
    }
}
