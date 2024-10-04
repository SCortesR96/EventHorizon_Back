<?php

namespace App\Modules\Auth\Domain\Repository;

use App\Modules\Auth\Data\Entities\SignInEntity;
use App\Modules\Auth\Domain\Responses\SignInResponse;
use App\Modules\User\Data\Entities\UserStoreEntity;

abstract class IAuthRepository {
    public abstract function signIn(SignInEntity $params): SignInResponse;
    public abstract function refreshToken(): SignInResponse;
}
