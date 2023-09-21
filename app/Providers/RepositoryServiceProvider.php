<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//Repository
use App\Repositories\Registration\RegistrationRepository;
use App\Repositories\ProductRepository;

//Interface
use App\Interfaces\Registration\RegistrationRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RegistrationRepositoryInterface::class, RegistrationRepository::class);
        $this->app->bind(ProductRepositoryInterface::class , ProductRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
