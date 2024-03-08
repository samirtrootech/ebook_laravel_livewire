<?php

namespace App\Providers;

use App\View\Components\Avatar;
use App\View\Components\ConfirmationModal;
use App\View\Components\FileInput;
use App\View\Components\Header;
use App\View\Components\PageHeader;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        Blade::component('header', Header::class);
        Blade::component('avatar', Avatar::class);
        Blade::component('page-header', PageHeader::class);
        Blade::component('file-input', FileInput::class);
        Blade::component('confirmation-modal', ConfirmationModal::class);
    }
}
