<?php

namespace App\Modules\User\Data\Entities;

use Illuminate\Http\Request;

class UserUpdateEntity
{
    public string   $name;

    public function __construct(Request $request)
    {
        $this->name             = $request->name;
    }
}
