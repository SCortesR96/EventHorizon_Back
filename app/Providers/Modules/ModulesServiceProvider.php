<?php

namespace App\Providers\Modules;

use App\Modules\Auth\Data\Repository\AuthRepository;
use App\Modules\Auth\Domain\Repository\IAuthRepository;
use App\Modules\User\Data\Repository\UserRepository;
use App\Modules\User\Domain\Repository\IUserRepository;
use Illuminate\Support\ServiceProvider;

class ModulesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            IUserRepository::class,
            UserRepository::class
        );

        $this->app->bind(
            IAuthRepository::class,
            AuthRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
