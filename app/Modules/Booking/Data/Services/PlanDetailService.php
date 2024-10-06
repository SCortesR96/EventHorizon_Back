<?php

namespace App\Modules\Booking\Data\Services;

use App\Models\Booking\PlanDetail;
use App\Utils\Services\ResponseService;
use App\Http\Resources\Booking\PlanDetailResource;
use App\Utils\Entities\Pagination\PaginationEntity;
use App\Utils\Entities\Responses\{
    ResponseEntity,
    PaginationResponseEntity,
};
use App\Modules\Booking\Data\Entities\PlanDetail\{
    PlanDetailStoreEntity,
    PlanDetailUpdateEntity,
};

class PlanDetailService
{
    public function index(PaginationEntity $pagination): PaginationResponseEntity
    {
        $planProducts = PlanDetail::where('description', 'like', '%' . $pagination->search . '%')
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
            PlanDetailResource::collection($planProducts->items())
        );
    }

    public function show(int $id): ResponseEntity
    {
        if (!$planProduct = $this->verifyPlan($id)) {
            return ResponseService::notFound();
        }

        $resource = PlanDetailResource::make($planProduct);
        return ResponseService::load($resource);
    }

    public function store(PlanDetailStoreEntity $entity): bool
    {
        $planProduct = new PlanDetail();
        $planProduct->fill($entity->toArray());

        if ($planProduct->save()) {
            return true;
        }

        throw new \Exception(__('responses.error.saved'));
    }

    public function update(PlanDetailUpdateEntity $entity, int $id): ResponseEntity
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

    public function verifyPlan(int $id): PlanDetail | false
    {
        if (!$planProduct = PlanDetail::find($id)) {
            return false;
        }

        return $planProduct;
    }
}
