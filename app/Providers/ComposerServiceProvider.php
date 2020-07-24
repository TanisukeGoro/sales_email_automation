<?php

namespace App\Providers;

use App\Http\ViewComposers\CompanyLargeCategoriesComposer;
use App\Http\ViewComposers\CompanyMiddleCategoriesComposer;
use App\Http\ViewComposers\RemainingSendCountsComposer;
use App\Http\ViewComposers\SentCountsComposer;
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
            CompanyLargeCategoriesComposer::class => [
                'layouts/*', 'profile/*',
            ],
            CompanyMiddleCategoriesComposer::class => [
                'layouts/*', 'profile/*',
            ],
            SentCountsComposer::class => [
                'layouts/*', 'profile/*',
            ],
            RemainingSendCountsComposer::class => [
                'layouts/navbars/navs/auth', 'profile/*',
            ],
        ]);
    }
}
