<?php

namespace App\Modules\Auth\Data\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Modules\Auth\Data\Services\AuthService;
use App\Modules\Auth\Data\Entities\SignInEntity;
use App\Modules\Auth\Domain\Responses\SignInResponse;
use App\Modules\Auth\Domain\Repository\IAuthRepository;

class AuthRepository extends IAuthRepository
{
    private $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function signIn(SignInEntity $params): SignInResponse
    {
        $response = $this->service->validateSignIn($params);
        // $response = $this->service->createToken($user);
        return $response;
    }

    public function refreshToken(): SignInResponse
    {
        $user = User::find(Auth::user()->id);
        $response = $this->service->generateResponse($user->email, Auth::refresh());
        return $response;
    }
}
