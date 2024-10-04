<?php

namespace App\Modules\User\Data\Entities;

use Illuminate\Http\Request;

class UserStoreEntity
{
    public string   $username;
    public string   $name;
    public string   $email;

    public function __construct(Request $request)
    {
        $this->username         = $request->username;
        $this->name             = $request->name;
        $this->email            = $request->email;
    }
}
