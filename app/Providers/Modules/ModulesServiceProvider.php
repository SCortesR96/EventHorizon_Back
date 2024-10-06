<?php

namespace App\Providers\Modules;

use Illuminate\Support\ServiceProvider;
use App\Modules\Auth\Data\Repository\AuthRepository;
use App\Modules\User\Data\Repository\UserRepository;
use App\Modules\Auth\Domain\Repository\IAuthRepository;
use App\Modules\User\Domain\Repository\IUserRepository;
use App\Modules\Booking\Data\Repository\{
    BookingRepository,
    PlanDetailRepository,
    PlanProductRepository,
    PlanRepository
};
use App\Modules\Booking\Domain\Repository\{
    IBookingRepository,
    IPlanDetailRepository,
    IPlanProductRepository,
    IPlanRepository
};

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

        $this->app->bind(
            IBookingRepository::class,
            BookingRepository::class
        );

        $this->app->bind(
            IPlanRepository::class,
            PlanRepository::class
        );

        $this->app->bind(
            IPlanProductRepository::class,
            PlanProductRepository::class
        );

        $this->app->bind(
            IPlanDetailRepository::class,
            PlanDetailRepository::class
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
