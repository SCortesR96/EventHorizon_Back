<?php

namespace App\Modules\Booking\Data\Repository;

use App\Modules\Booking\Data\Services\BookingService;
use App\Utils\Entities\Pagination\PaginationEntity;
use App\Modules\Booking\Domain\Repository\IBookingRepository;
use App\Utils\Entities\Responses\{
    PaginationResponseEntity,
    ResponseEntity
};
use App\Modules\Booking\Data\Entities\Booking\{
    BookingStoreEntity,
    BookingUpdateEntity
};

class BookingRepository extends IBookingRepository
{
    private BookingService $planService;

    public function __construct(BookingService $planService)
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

    public function store(BookingStoreEntity $entity): bool
    {
        return $this->planService->store($entity);
    }

    public function update(BookingUpdateEntity $entity, int $id): ResponseEntity
    {
        return $this->planService->update($entity, $id);
    }

    public function delete(int $id): ResponseEntity
    {
        return $this->planService->delete($id);
    }
}
