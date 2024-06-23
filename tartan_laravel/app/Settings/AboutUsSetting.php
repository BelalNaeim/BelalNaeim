<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class AboutUsSetting extends Settings
{
    public string $about_ar;

    public string $about_en;

    public static function group(): string
    {
        return 'about';
    }
}
