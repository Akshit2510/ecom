<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//Repository
use App\Repositories\Registration\RegistrationRepository;
use App\Repositories\ProductRepository;
use App\Repositories\CartRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ConfigurationRepository;

//Interface
use App\Interfaces\Registration\RegistrationRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\CartRepositoryInterface;
use App\Interfaces\OrderRepositoryInterface;
use App\Interfaces\ConfigurationRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RegistrationRepositoryInterface::class, RegistrationRepository::class);
        $this->app->bind(ProductRepositoryInterface::class , ProductRepository::class);
        $this->app->bind(CartRepositoryInterface::class , CartRepository::class);
        $this->app->bind(OrderRepositoryInterface::class , OrderRepository::class);
        $this->app->bind(ConfigurationRepositoryInterface::class , ConfigurationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
