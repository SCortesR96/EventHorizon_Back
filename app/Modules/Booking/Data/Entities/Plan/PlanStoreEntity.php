<?php

namespace App\Modules\Booking\Data\Entities\Plan;

use Illuminate\Http\Request;

class PlanStoreEntity
{
    public string $name;
    public string $title;
    public string $description;

    public function __construct(Request $request)
    {
        $this->name         = $request->name;
        $this->title        = $request->title;
        $this->description  = $request->description ?? '';
    }

    public function toArray()
    {
        return [
            'name'        => $this->name,
            'title'       => $this->title,
            'description' => $this->description,
        ];
    }
}
