<?php

namespace App\Modules\Booking\Domain\Repository;

use App\Utils\Entities\Responses\ResponseEntity;
use App\Utils\Entities\Pagination\PaginationEntity;
use App\Utils\Entities\Responses\PaginationResponseEntity;
use App\Modules\Booking\Data\Entities\Booking\{
    BookingUpdateEntity,
    BookingStoreEntity
};

abstract class IBookingRepository
{
    public abstract function index(PaginationEntity $pagination): PaginationResponseEntity;
    public abstract function show(int $id): ResponseEntity;
    public abstract function store(BookingStoreEntity $entity): bool;
    public abstract function update(BookingUpdateEntity $entity, int $id): ResponseEntity;
    public abstract function delete(int $id): ResponseEntity;
}
