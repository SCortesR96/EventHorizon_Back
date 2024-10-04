<?php

namespace App\Modules\Auth\Data\Services;

use Exception;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Modules\Auth\Data\Entities\SignInEntity;
use App\Modules\Auth\Domain\Responses\SignInResponse;
use App\Modules\Auth\Domain\Responses\UserSignInResponse;

class AuthService
{
    public function validateSignIn(SignInEntity $params): SignInResponse
    {
        $credentials = ['email' => $params->email, 'password' => $params->password];

        if (!$token = auth()->attempt($credentials)) {
            throw new Exception(
                __('responses.error.unauthorized'),
                JsonResponse::HTTP_UNAUTHORIZED
            );
        }

        return $this->generateResponse($params->email, $token);
    }

    public function generateResponse(string $email, $token)
    {
        $user = User::findByEmail($email);
        $data = new UserSignInResponse($user);

        return new SignInResponse(
            [
                'accessToken'   => $token,
                'tokenType'     => 'Bearer',
                'expiresIn'     => now()->addHours(4)->format('Y-m-d H:i:s')
            ],
            $data->toArray(),
        );
    }

    // public function saveUser(SignUpEntity $params): User
    // {
    //     $user = new User();
    //     $user->fill($params->toArray());

    //     if ($user->save())
    //         return $user;
    //     throw new Exception(
    //         'Error al guardar el usuario',
    //         JsonResponse::HTTP_BAD_REQUEST
    //     );
    // }
}
