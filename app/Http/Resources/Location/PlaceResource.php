<?php

namespace App\Http\Resources\Location;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'          => $this->name,
            'description'   => $this->description,
            'address'       => $this->address,
            'postal_code'   => $this->postal_code,
            'country'       => $this->country,
            'state'         => $this->state,
            'city'          => $this->city,
        ];
    }
}
