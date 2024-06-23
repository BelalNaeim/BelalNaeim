<?php

namespace App\Filament\Pages;

use App\Settings\AboutUsSetting;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms;
use Filament\Pages\SettingsPage;

class AboutUs extends SettingsPage
{
    use HasPageShield;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = AboutUsSetting::class;

    public static function getNavigationLabel(): string
    {
        return __('admin.about_us');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('admin.manage_contacts');
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Textarea::make('about_ar')
                ->label(__('admin.about', ['lang' => 'العربية']))
                ->required()
                ->maxLength(512),
            Forms\Components\Textarea::make('about_en')
                ->label(__('admin.about', ['lang' => 'English']))
                ->required()
                ->maxLength(512),
        ];
    }

    protected function getTitle(): string
    {
        return __('admin.about_us');
    }
}
