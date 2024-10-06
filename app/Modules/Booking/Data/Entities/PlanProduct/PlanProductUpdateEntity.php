<?php

namespace App\Modules\Booking\Data\Entities\PlanProduct;

use Illuminate\Http\Request;

class PlanProductUpdateEntity
{
    public string $name;
    public string $description;

    public function __construct(Request $request)
    {
        $this->name         = $request->name;
        $this->description  = $request->description ?? '';
    }

    public function toArray()
    {
        return [
            'name'        => $this->name,
            'description' => $this->description,
        ];
    }
}
