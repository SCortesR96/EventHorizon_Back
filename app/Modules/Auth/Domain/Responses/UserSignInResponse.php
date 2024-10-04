<?php

namespace App\Modules\Auth\Domain\Responses;

use App\Models\User;
use App\Models\Gender;
use App\Models\DocumentType;
use App\Http\Resources\Options\GenderResource;
use App\Http\Resources\Options\DocumentTypeResource;

class UserSignInResponse
{
    public User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function toArray()
    {
        $res = [
            'id'                => $this->user->id,
            'username'          => $this->user->username,
            'name'              => $this->user->name,
            'lastName'          => $this->user->last_name,
            'secondLastName'    => $this->user->second_last_name,
            'birthdate'         => $this->user->birthdate,
            'phone'             => $this->user->phone,
            'email'             => $this->user->email,
            'avatar'            => $this->user->avatar,
            'document'          => $this->user->document,
            'gender'            => GenderResource::make(Gender::find($this->user->gender_id)),
            'documentType'      => DocumentTypeResource::make(DocumentType::find($this->user->document_type_id)),
        ];
        return $res;
    }
}
