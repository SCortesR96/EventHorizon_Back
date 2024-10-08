<?php

namespace App\Modules\Location\Data\Services;

use App\Models\Location\Place;
use App\Utils\Services\ResponseService;
use App\Http\Resources\Location\PlaceResource;
use App\Utils\Entities\Pagination\PaginationEntity;
use App\Modules\Location\Data\Entities\{
    PlaceStoreEntity,
    PlaceUpdateEntity
};
use App\Utils\Entities\Responses\{
    ResponseEntity,
    PaginationResponseEntity,
};

class PlaceService
{
    public function index(PaginationEntity $pagination): PaginationResponseEntity
    {
        $plans = Place::paginate(
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
            PlaceResource::collection($plans->items())
        );
    }

    public function show(int $id): ResponseEntity
    {
        if (!$plan = $this->verifyPlace($id)) {
            return ResponseService::notFound();
        }

        $resource = PlaceResource::make($plan);
        return ResponseService::load($resource);
    }

    public function store(PlaceStoreEntity $entity): bool
    {
        $plan = new Place();
        $plan->fill($entity->toArray());

        if ($plan->save()) {
            return true;
        }

        throw new \Exception(__('responses.error.saved'));
    }

    public function update(PlaceUpdateEntity $entity, int $id): ResponseEntity
    {
        if (!$plan = $this->verifyPlace($id)) {
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
        if (!$plan = $this->verifyPlace($id)) {
            return ResponseService::notFound();
        }

        if ($plan->delete()) {
            return ResponseService::deleted();
        }

        throw new \Exception(__('responses.error.deleted'));
    }

    public function verifyPlace(int $id): Place | false
    {
        if (!$plan = Place::find($id)) {
            return false;
        }

        return $plan;
    }
}
