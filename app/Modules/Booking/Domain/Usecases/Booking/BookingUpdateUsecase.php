<?php

namespace App\Modules\Booking\Domain\Usecases\Booking;

use App\Utils\Entities\Responses\ResponseEntity;
use App\Modules\Booking\Domain\Repository\IBookingRepository;
use App\Modules\Booking\Data\Entities\Booking\BookingUpdateEntity;

class BookingUpdateUsecase
{
    private IBookingRepository $repository;

    public function __construct(IBookingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(BookingUpdateEntity $entity, int $id): ResponseEntity
    {
        return $this->repository->update($entity, $id);
    }
}
