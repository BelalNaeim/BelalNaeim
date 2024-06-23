<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {

    public function up(): void
    {
        $this->migrator->add('about.about_ar', 'عن ' . config('app.name'));
        $this->migrator->add('about.about_en', 'about ' . config('app.name'));
    }
};
