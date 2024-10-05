<?php

namespace App\Modules\Booking\Data\Services;

use App\Models\Booking\Plan;
use App\Utils\Services\ResponseService;
use App\Http\Resources\Booking\PlanResource;
use App\Utils\Entities\Responses\ResponseEntity;
use App\Modules\Booking\Data\Entities\PlanStoreEntity;
use App\Modules\Booking\Data\Entities\PlanUpdateEntity;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PlanService
{
    public function index(): ResourceCollection
    {
        return PlanResource::collection(Plan::get());
    }

    public function show(int $id): ResponseEntity
    {
        if (!$plan = $this->verifyPlan($id)) {
            return ResponseService::notFound();
        }

        $resource = PlanResource::make($plan);
        return ResponseService::load($resource);
    }

    public function store(PlanStoreEntity $entity): bool
    {
        $plan = new Plan();
        $plan->fill($entity->toArray());

        if ($plan->save()) {
            return true;
        }

        throw new \Exception(__('responses.error.saved'));
    }

    public function update(PlanUpdateEntity $entity, int $id): ResponseEntity
    {
        if (!$plan = $this->verifyPlan($id)) {
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
        if (!$plan = $this->verifyPlan($id)) {
            return ResponseService::notFound();
        }

        if ($plan->delete()) {
            return ResponseService::deleted();
        }

        throw new \Exception(__('responses.error.deleted'));
    }

    public function verifyPlan(int $id): Plan | false
    {
        if (!$plan = Plan::find($id)) {
            return false;
        }

        return $plan;
    }
}
