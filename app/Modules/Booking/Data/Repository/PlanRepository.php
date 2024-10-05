<?php

namespace App\Modules\Booking\Data\Repository;

use App\Utils\Entities\Responses\ResponseEntity;
use App\Modules\Booking\Data\Services\PlanService;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Modules\Booking\Domain\Repository\IPlanRepository;
use App\Modules\Booking\Data\Entities\{PlanStoreEntity, PlanUpdateEntity};

class PlanRepository extends IPlanRepository
{
    private PlanService $planService;

    public function __construct(PlanService $planService)
    {
        $this->planService = $planService;
    }

    public function index(): ResourceCollection
    {
        return $this->planService->index();
    }

    public function show(int $id): ResponseEntity
    {
        return $this->planService->show($id);
    }

    public function store(PlanStoreEntity $entity): bool
    {
        return $this->planService->store($entity);
    }

    public function update(PlanUpdateEntity $entity, int $id): ResponseEntity
    {
        return $this->planService->update($entity, $id);
    }

    public function delete(int $id): ResponseEntity
    {
        return $this->planService->delete($id);
    }
}
