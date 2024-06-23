<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AreaResource\Pages;
use App\Filament\Resources\AreaResource\RelationManagers;
use App\Models\Area;
use Filament\Forms;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class AreaResource extends Resource
{
    use Translatable;

    protected static ?string $model = Area::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(self::getForm());
    }

    public static function getForm(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->label(__('admin.name'))
                ->required(),
            Forms\Components\BelongsToSelect::make('city_id')
                ->createOptionForm(CityResource::getForm())
                ->relationship('city', 'name', fn(Builder $query) => CityResource::getEloquentQuery())
                ->label(__('admin.city'))
                ->required(),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->searchable()
                    ->label(__('admin.id')),
                Tables\Columns\TextColumn::make('name')
                    ->label(__('admin.name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('city.name')
                    ->label(__('admin.city'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('admin.created_at'))
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('admin.updated_at'))
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListAreas::route('/'),
            'create' => Pages\CreateArea::route('/create'),
            'edit' => Pages\EditArea::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): string
    {
        return __('admin.area');
    }

    public static function getPluralLabel(): string
    {
        return __('admin.areas');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('admin.manage_shipping');
    }

    protected static function getNavigationBadge(): ?string
    {
        return self::getEloquentQuery()->count();
    }
}
