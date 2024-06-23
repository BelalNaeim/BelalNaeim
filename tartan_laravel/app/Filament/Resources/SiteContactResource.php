<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteContactResource\Pages;
use App\Filament\Resources\SiteContactResource\RelationManagers;
use App\Models\SiteContact;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class SiteContactResource extends Resource
{
    protected static ?string $model = SiteContact::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-alt-2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('message')
                    ->required()
                    ->maxLength(191),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('message')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiteContacts::route('/'),
            'create' => Pages\CreateSiteContact::route('/create'),
            'edit' => Pages\EditSiteContact::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): string
    {
        return __('admin.contact_us');
    }

    public static function getPluralLabel(): string
    {
        return __('admin.contact_uss');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('admin.manage_contacts');
    }
}
