<?php

namespace App\Providers;

use App\Service\ArgonPresetService;
use Laravel\Ui\UiCommand;
use LaravelFrontendPresets\ArgonPreset\ArgonPresetServiceProvider;

class ArgonPresetUpdateServiceProvider extends ArgonPresetServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(
            'LaravelFrontendPresets\ArgonPreset\ArgonPresetServiceProvider',
            'App\Providers\ArgonPresetUpdateServiceProvider'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        UiCommand::macro('argon:update', function ($command): void {
            ArgonPresetService::update();
            $command->info('Argon scaffolding updated successfully.');
        });
    }
}
