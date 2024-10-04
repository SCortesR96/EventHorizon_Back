<?php

namespace App\Modules\Auth\Domain\Responses;

class SignInResponse
{
    public array $token;
    public array $user;

    public function __construct(
        array $token,
        array $user,
    ) {
        $this->token  = $token;
        $this->user  = $user;
    }

    public function __invoke()
    {
        return [
            'token' => $this->token,
            'user' => $this->user,
        ];
    }

    public function toArray()
    {
        return [
            'token' => $this->token,
            'user' => $this->user,
        ];
    }
}
