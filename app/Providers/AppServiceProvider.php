<?php

namespace App\Providers;

use App\Domain\AutenticationDomain;
use App\Domain\AutenticationDomainInterface;
use App\Domain\InputDomain;
use App\Domain\InputDomainInterface;
use App\Domain\RequestDomain;
use App\Domain\RequestDomainInterface;
use APP\UserRepository\UserRepositoryImp;
use APP\UserRepository\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use InventoryRepository\InventoryRepositoryImp;
use InventoryRepository\InventoryRepositoryInterface;
use OrderRepository\OrderRepositoryImp;
use OrderRepository\OrderRepositoryInterface;
use ProviderRepository\ProviderRepositoryImp;
use ProviderRepository\ProviderRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            InventoryRepositoryInterface::class,
            InventoryRepositoryImp::class
        );
        $this->app->bind(
            OrderRepositoryInterface::class,
            OrderRepositoryImp::class
        );
        $this->app->bind(
            ProviderRepositoryInterface::class,
            ProviderRepositoryImp::class
        );
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepositoryImp::class
        );

        $this->app->bind(
            AutenticationDomainInterface::class,
            AutenticationDomain::class
        );

        $this->app->bind(
            InputDomainInterface::class,
            InputDomain::class
        );

        $this->app->bind(
            RequestDomainInterface::class,
            RequestDomain::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    }
