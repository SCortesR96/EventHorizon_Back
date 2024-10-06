<?php

namespace App\Modules\Booking\Data\Services;

use App\Models\Booking\PlanProduct;
use App\Utils\Services\ResponseService;
use App\Http\Resources\Booking\PlanProductResource;
use App\Utils\Entities\Pagination\PaginationEntity;
use App\Utils\Entities\Responses\{
    ResponseEntity,
    PaginationResponseEntity,
};
use App\Modules\Booking\Data\Entities\PlanProduct\{
    PlanProductStoreEntity,
    PlanProductUpdateEntity,
};

class PlanProductService
{
    public function index(PaginationEntity $pagination): PaginationResponseEntity
    {
        $planProducts = PlanProduct::where('name', 'like', '%' . $pagination->search . '%')
            ->orWhere('description', 'like', '%' . $pagination->search . '%')
            ->paginate(
                $pagination->itemsPerPage,
                ['*'],
                'page',
                $pagination->page
            );

        return new PaginationResponseEntity(
            $planProducts->perPage(),
            $planProducts->currentPage(),
            $planProducts->total(),
            $planProducts->lastPage(),
            PlanProductResource::collection($planProducts->items())
        );
    }

    public function show(int $id): ResponseEntity
    {
        if (!$planProduct = $this->verifyPlan($id)) {
            return ResponseService::notFound();
        }

        $resource = PlanProductResource::make($planProduct);
        return ResponseService::load($resource);
    }

    public function store(PlanProductStoreEntity $entity): bool
    {
        $planProduct = new PlanProduct();
        $planProduct->fill($entity->toArray());

        if ($planProduct->save()) {
            return true;
        }

        throw new \Exception(__('responses.error.saved'));
    }

    public function update(PlanProductUpdateEntity $entity, int $id): ResponseEntity
    {
        if (!$planProduct = $this->verifyPlan($id)) {
            return ResponseService::notFound();
        }

        $planProduct->fill($entity->toArray());

        if ($planProduct->save()) {
            return ResponseService::updated();
        }

        return ResponseService::errorSaved();
    }

    public function delete(int $id): ResponseEntity
    {
        if (!$planProduct = $this->verifyPlan($id)) {
            return ResponseService::notFound();
        }

        if ($planProduct->delete()) {
            return ResponseService::deleted();
        }

        throw new \Exception(__('responses.error.deleted'));
    }

    public function verifyPlan(int $id): PlanProduct | false
    {
        if (!$planProduct = PlanProduct::find($id)) {
            return false;
        }

        return $planProduct;
    }
}
