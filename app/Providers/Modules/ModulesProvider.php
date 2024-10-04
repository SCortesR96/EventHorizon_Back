<?php

namespace App\Providers\Modules;

use App\Modules\User\Data\Repository\UserRepository;
use App\Modules\User\Domain\Repository\IUserRepository;
use Illuminate\Support\ServiceProvider;

class ModulesProvider extends ServiceProvider
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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
