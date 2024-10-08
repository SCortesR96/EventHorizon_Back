<?php

namespace App\Modules\Location\Data\Entities;

use Illuminate\Http\Request;

class PlaceUpdateEntity
{
    public string $name;
    public ?string $description;
    public string $address;
    public string $postal_code;
    public string $country;
    public string $state;
    public string $city;

    public function __construct(Request $request)
    {
        $this->name        = $request->name;
        $this->description = $request->description ?? null;
        $this->address     = $request->address;
        $this->postal_code = $request->postalCode;
        $this->country     = $request->country;
        $this->state       = $request->state;
        $this->city        = $request->city;
    }

    public function toArray(): array
    {
        return [
            'name'        => $this->name,
            'description' => $this->description,
            'address'     => $this->address,
            'postal_code' => $this->postal_code,
            'country'     => $this->country,
            'state'       => $this->state,
            'city'        => $this->city,
        ];
    }
}
