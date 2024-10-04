<?php

namespace App\Modules\User\Data\Entities;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserStoreEntity
{
    public string   $avatar;
    public string   $username;
    public string   $first_name;
    public string   $second_name;
    public string   $first_lastname;
    public string   $second_lastname;
    public string   $document_type_id;
    public string   $document;
    public string   $gender_id;
    public string   $phone_country;
    public string   $phone;
    public string   $birthdate;
    public string   $email;
    public string   $password;

    public function __construct(Request $request)
    {
        $this->avatar           = $request->avatar                  ?? '';;
        $this->username         = $request->username;
        $this->first_name       = $request->first_name;
        $this->second_name      = $request->second_name             ?? '';;
        $this->first_lastname   = $request->first_lastname;
        $this->second_lastname  = $request->second_lastname;
        $this->document_type_id = $request->document_type_id;
        $this->document         = $request->document;
        $this->gender_id        = $request->gender_id;
        $this->phone_country    = $request->phone_country;
        $this->phone            = $request->phone;
        $this->birthdate        = $request->birthdate;
        $this->email            = $request->email;
        $this->password         = Hash::make($request->password);
    }
}
