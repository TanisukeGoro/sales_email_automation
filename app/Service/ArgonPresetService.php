<?php

namespace App\Service;

use LaravelFrontendPresets\ArgonPreset\ArgonPreset;

class ArgonPresetService extends ArgonPreset
{
    /**
     * Update the preset.
     */
    public static function update(): void
    {
        static::updatePackages();
        static::updateAssets();
    }
}
