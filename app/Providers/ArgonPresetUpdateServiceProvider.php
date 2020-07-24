<?php

namespace App\Providers;

use App\Service\ArgonPresetService;
use Illuminate\Foundation\Console\PresetCommand;
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
        PresetCommand::macro('argon:update', function ($command): void {
            ArgonPresetService::update();
            $command->info('Argon scaffolding updated successfully.');
        });
    }
}
