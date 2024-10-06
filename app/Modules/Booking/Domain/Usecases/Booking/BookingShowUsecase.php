<?php

namespace App\Modules\Booking\Domain\Usecases\Booking;

use App\Utils\Entities\Responses\ResponseEntity;
use App\Modules\Booking\Domain\Repository\IBookingRepository;

class BookingShowUsecase
{
    private IBookingRepository $repository;

    public function __construct(IBookingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): ResponseEntity
    {
        return $this->repository->show($id);
    }
}
