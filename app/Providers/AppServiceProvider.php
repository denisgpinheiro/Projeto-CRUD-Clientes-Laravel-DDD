<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Contact\Repositories\ContactRepositoryInterface;
use App\Infrastructure\Repositories\ContactRepository;
use Illuminate\Support\Facades\URL;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            ContactRepositoryInterface::class,
            ContactRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        URL::forceScheme('http');
    }
}
