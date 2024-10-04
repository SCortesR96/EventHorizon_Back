<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Options\DocumentTypeResource;
use App\Http\Resources\Options\GenderResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'avatar'          => $this->avatar,
            'username'        => $this->username,
            'first_name'      => $this->first_name,
            'second_name'     => $this->second_name,
            'first_lastname'  => $this->first_lastname,
            'second_lastname' => $this->second_lastname,
            'document_type'   => new DocumentTypeResource($this->whenLoaded('documentType')),
            'document'        => $this->document,
            'gender'          => new GenderResource($this->whenLoaded('gender')),
            'phone_country'   => $this->phone_country,
            'phone'           => $this->phone,
            'birthdate'       => $this->birthdate,
            'email'           => $this->email,
            'enabled'         => $this->enabled,
        ];
    }
}
