<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Http\Requests\SignInRequest;
use App\Http\Controllers\MainController;
use Illuminate\Http\{JsonResponse, Request};
use App\Modules\Auth\Data\Entities\SignInEntity;
use App\Modules\Auth\Domain\Usecases\{
    RefreshTokenUsecase,
    SignInUsecase
};

class AuthController extends MainController
{
    private SignInUsecase $signInUsecase;
    private RefreshTokenUsecase $refreshTokenUsecase;

    public function __construct(
        SignInUsecase $signInUsecase,
        RefreshTokenUsecase $refreshTokenUsecase,
    ) {
        $this->signInUsecase = $signInUsecase;
        $this->refreshTokenUsecase = $refreshTokenUsecase;
    }

    /**
     * signIn
     *
     * @unauthenticated
     * @param  mixed $request
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function signIn(SignInRequest $request): JsonResponse
    {
        try {
            $params = new SignInEntity($request->email, $request->password);
            $data = $this->signInUsecase->execute($params);
            return $this->success(
                __('responses.success.sign_in'),
                $data,
                JsonResponse::HTTP_OK
            );
        } catch (Exception $e) {
            return $this->error($e, 'AuthController@signIn', 'Auth');
        }
    }

    /**
     * refreshToken
     *
     * @response array{"status": "success", "message": "Data loaded successfully.", "data": any }
     */
    public function refreshToken(): JsonResponse
    {
        try {
            $data = $this->refreshTokenUsecase->execute();
            return $this->success(
                __('responses.success.sign_in'),
                $data,
                JsonResponse::HTTP_OK
            );
        } catch (Exception $e) {
            return $this->error($e, 'AuthController@refreshToken', 'Auth');
        }
    }
}
