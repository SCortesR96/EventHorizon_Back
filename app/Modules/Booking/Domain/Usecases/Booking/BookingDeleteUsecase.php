<?php

namespace App\Modules\Booking\Domain\Usecases\Booking;

use App\Utils\Entities\Responses\ResponseEntity;
use App\Modules\Booking\Domain\Repository\IBookingRepository;

class BookingDeleteUsecase
{
    private IBookingRepository $repository;

    public function __construct(IBookingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): ResponseEntity
    {
        return $this->repository->delete($id);
    }
}
