<?php

namespace App\Modules\Booking\Domain\Usecases\Booking;

use App\Modules\Booking\Data\Entities\Booking\BookingStoreEntity;
use App\Modules\Booking\Domain\Repository\IBookingRepository;

class BookingStoreUsecase
{
    private IBookingRepository $repository;

    public function __construct(IBookingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(BookingStoreEntity $entity): bool
    {
        return $this->repository->store($entity);
    }
}
