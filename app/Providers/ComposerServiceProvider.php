<?php

namespace App\Providers;

use App\Http\ViewComposers\CompanyCategoriesComposer;
use Illuminate\Support\ServiceProvider;
use View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composers([
            CompanyCategoriesComposer::class => [
                'layouts/*', 'profile/*',
            ],
        ]);
    }
}
