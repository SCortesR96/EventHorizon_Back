<?php

namespace App\Modules\Booking\Data\Entities\PlanDetail;

use Illuminate\Http\Request;

class PlanDetailStoreEntity
{
    public float $price;
    public int $plan_id;
    public string $description;

    public function __construct(Request $request)
    {
        $this->price        = $request->price;
        $this->plan_id      = $request->plan_id;
        $this->description  = $request->description ?? '';
    }

    public function toArray()
    {
        return [
            'price'       => $this->price,
            'plan_id'     => $this->plan_id,
            'description' => $this->description,
        ];
    }
}
