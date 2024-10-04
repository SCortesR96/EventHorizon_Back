<?php

namespace App\Modules\Auth\Data\Entities;

class SignInEntity
{
    public string $email;
    public string $password;

    public function __construct(string $email, string $password)
    {
        $this->email    = $email;
        $this->password = $password;
    }
}
