<?php

namespace App\Providers;

use App\Models\Books;
use App\Models\User;
use App\Observers\BooksObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
        Books::observe(BooksObserver::class);
    }
}
