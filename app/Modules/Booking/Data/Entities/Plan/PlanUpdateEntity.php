<?php

namespace App\Modules\Booking\Data\Entities\Plan;

use Illuminate\Http\Request;

class PlanUpdateEntity
{
    public string $title;
    public string $description;

    public function __construct(Request $request)
    {
        $this->title        = $request->title;
        $this->description  = $request->description ?? '';
    }

    public function toArray()
    {
        return [
            'title'       => $this->title,
            'description' => $this->description,
        ];
    }
}
