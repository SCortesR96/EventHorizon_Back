<?php

namespace App\Modules\Booking\Data\Services;

use App\Models\Booking\Booking;
use App\Utils\Services\ResponseService;
use App\Http\Resources\Booking\BookingResource;
use App\Utils\Entities\Pagination\PaginationEntity;
use App\Utils\Entities\Responses\{
    ResponseEntity,
    PaginationResponseEntity,
};
use App\Modules\Booking\Data\Entities\Booking\{
    BookingStoreEntity,
    BookingUpdateEntity,
};

class BookingService
{
    public function index(PaginationEntity $pagination): PaginationResponseEntity
    {
        $plans = Booking::paginate(
            $pagination->itemsPerPage,
            ['*'],
            'page',
            $pagination->page
        );

        return new PaginationResponseEntity(
            $plans->perPage(),
            $plans->currentPage(),
            $plans->total(),
            $plans->lastPage(),
            BookingResource::collection($plans->items())
        );
    }

    public function show(int $id): ResponseEntity
    {
        if (!$plan = $this->verifyBooking($id)) {
            return ResponseService::notFound();
        }

        $resource = BookingResource::make($plan);
        return ResponseService::load($resource);
    }

    public function store(BookingStoreEntity $entity): bool
    {
        $plan = new Booking();
        $plan->fill($entity->toArray());

        if ($plan->save()) {
            return true;
        }

        throw new \Exception(__('responses.error.saved'));
    }

    public function update(BookingUpdateEntity $entity, int $id): ResponseEntity
    {
        if (!$plan = $this->verifyBooking($id)) {
            return ResponseService::notFound();
        }

        $plan->fill($entity->toArray());

        if ($plan->save()) {
            return ResponseService::updated();
        }

        return ResponseService::errorSaved();
    }

    public function delete(int $id): ResponseEntity
    {
        if (!$plan = $this->verifyBooking($id)) {
            return ResponseService::notFound();
        }

        if ($plan->delete()) {
            return ResponseService::deleted();
        }

        throw new \Exception(__('responses.error.deleted'));
    }

    public function verifyBooking(int $id): Booking | false
    {
        if (!$plan = Booking::find($id)) {
            return false;
        }

        return $plan;
    }
}
