<?php

namespace App\Modules\User\Data\Entities;

use Illuminate\Http\Request;

class UserUpdateEntity
{
    public string   $avatar;
    public string   $first_name;
    public string   $second_name;
    public string   $first_lastname;
    public string   $second_lastname;
    public string   $gender_id;
    public string   $phone_country;
    public string   $phone;
    public string   $enabled;

    public function __construct(Request $request)
    {
        $this->avatar           = $request->avatar                  ?? '';;
        $this->first_name       = $request->first_name;
        $this->second_name      = $request->second_name             ?? '';;
        $this->first_lastname   = $request->first_lastname;
        $this->second_lastname  = $request->second_lastname;
        $this->gender_id        = $request->gender_id;
        $this->phone_country    = $request->phone_country;
        $this->phone            = $request->phone;
        $this->enabled          = $request->enabled;
    }
}
