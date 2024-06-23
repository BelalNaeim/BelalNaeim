<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlaygroundResource\Pages;
use App\Filament\Resources\PlaygroundResource\RelationManagers;
use App\Models\Area;
use App\Models\City;
use App\Models\Playground;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Humaidem\FilamentMapPicker\Fields\OSMMap;
use Illuminate\Database\Eloquent\Builder;
use Stevebauman\Location\Facades\Location;


class PlaygroundResource extends Resource
{
    use Translatable;

    protected static ?string $model = Playground::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\BelongsToSelect::make('user_id')
                        ->default(auth()->id())
                        ->relationship('user', 'name', fn(Builder $query) => UserResource::getEloquentQuery())
                        ->createOptionForm(UserResource::getForm())
                        ->label(__('admin.owner'))
                        ->required(),
                ])->label(__('admin.owner')),

                Forms\Components\Card::make([
                    SpatieMediaLibraryFileUpload::make('main_image')
                        ->label(__('admin.main_image'))
                        ->collection('vendor_main_images'),

                    SpatieMediaLibraryFileUpload::make('gallery_images')
                        ->label(__('admin.gallery_images'))
                        ->collection('vendor_gallery_images')
                        ->multiple()
                        ->enableReordering(),
                ])->label(__('admin.images')),

                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('name')
                        ->label(__('admin.name'))
                        ->required(),

                    Forms\Components\TextInput::make('desc')
                        ->label(__('admin.description'))
                        ->required(),

                    Forms\Components\BelongsToSelect::make('city_id')
                        ->relationship('city', 'name', fn(Builder $query) => CityResource::getEloquentQuery())
                        ->createOptionForm(CityResource::getForm())
                        ->label(__('admin.city'))
                        ->options(function () {
                            return City::all()->pluck('name', 'id');
                        })
                        ->reactive()
                        ->default(null)
                        ->required(),

                    Forms\Components\BelongsToSelect::make('area_id')
                        ->createOptionForm(AreaResource::getForm())
                        ->relationship('area', 'name', fn(Builder $query) => AreaResource::getEloquentQuery())
                        ->label(__('admin.area'))
                        ->options(function (Closure $get) {
                            if ($get('city_id') === null) {
                                return [];
                            }

                            return Area::where('city_id', $get('city_id'))->pluck('name', 'id');
                        })
                        ->disabled(function (Closure $get) {
                            return $get('city_id') === null;
                        })
                        ->createOptionForm(AreaResource::getForm())
                        ->required(),

                    Forms\Components\TextInput::make('size')
                        ->label(__('admin.size'))
                        ->numeric()
                        ->required(),

                    Forms\Components\TextInput::make('address')
                        ->label(__('admin.address'))
                        ->required(),

                    Forms\Components\TextInput::make('price')
                        ->label(__('admin.price'))
                        ->numeric()
                        ->step(0.01)
                        ->required(),

                    Forms\Components\TextInput::make('night_price')
                        ->label(__('admin.night_price'))
                        ->numeric()
                        ->step(0.01)
                        ->required(),
                ])->label(__('admin.data')),

                Forms\Components\Card::make([
                    OSMMap::make('location')
                        ->afterStateHydrated(function ($state, callable $set) {
                            if (!$state) return;
                            $set('lat', $state['lat']);
                            $set('lng', $state['lng']);
                        })
                        ->afterStateUpdated(function ($state, callable $set) {
                            $set('lat', $state['lat']);
                            $set('lng', $state['lng']);
                        })
                        ->label(__('admin.location'))
                        ->showMarker()
                        ->reactive()
                        ->default(function () {
                            /** @var \Stevebauman\Location\Position $currentUserInfo */
                            $currentUserInfo = Location::get(request()->ip());

                            if ($currentUserInfo)
                                return [
                                    'lat' => $currentUserInfo->latitude,
                                    'lng' => $currentUserInfo->longitude,
                                ];

                            // else
                            return [
                                'lat' => 0,
                                'lng' => 0,
                            ];
                        })
                        ->draggable()
                        ->extraControl([
                            'zoomDelta' => 1,
                            'zoomSnap' => 0.25,
                            'wheelPxPerZoomLevel' => 60
                        ])
                        // tiles url (refer to https://www.spatialbias.com/2018/02/qgis-3.0-xyz-tile-layers/)
                        ->tilesUrl('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}'),

                    Forms\Components\TextInput::make('lat')
                        ->label(__('admin.lat') . ' (Latitude)')
                        ->numeric()
                        ->disabled()
                        ->mutateDehydratedStateUsing(function ($state) {
                            if (!$state) return $state;
                            return number_format($state, 6);
                        })
                        ->maxValue(99)
                        ->minValue(-99)
                        ->required(),

                    Forms\Components\TextInput::make('lng')
                        ->label(__('admin.lng') . ' (Longitude)')
                        ->numeric()
                        ->disabled()
                        ->mutateDehydratedStateUsing(function ($state) {
                            if (!$state) return $state;
                            return number_format($state, 6);
                        })
                        ->maxValue(99)
                        ->minValue(-99)
                        ->required(),
                ]),

                Forms\Components\Card::make([
                    Forms\Components\Repeater::make('times')
                        ->required()
                        ->minItems(1)
                        ->schema([
                            Forms\Components\TimePicker::make('time')
                                ->label(__('admin.time'))
                                ->required(),
                            Forms\Components\Select::make('price')
                                ->label(__('admin.price'))
                                ->hint(__('admin.price_time_hint'))
                                ->options([
                                    'day_time' => __('admin.day_time'),
                                    'night_time' => __('admin.night_time')
                                ])
                                ->required(),
                        ])->label(__('admin.times')),
                ])->label(__('admin.data')),

            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->can('view_playground')) {
            return parent::getEloquentQuery();
        }

        return parent::getEloquentQuery()->whereBelongsTo(auth()->user());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('admin.name'))
                    ->toggleable(),

                Tables\Columns\TextColumn::make('desc')
                    ->label(__('admin.description'))
                    ->toggleable()
                    ->toggledHiddenByDefault(),

                Tables\Columns\TextColumn::make('city.name')
                    ->label(__('admin.city'))
                    ->toggleable(),

                Tables\Columns\TextColumn::make('area.name')
                    ->label(__('admin.area'))
                    ->toggleable(),

                Tables\Columns\TextColumn::make('size')
                    ->label(__('admin.size'))
                    ->toggleable(),

                Tables\Columns\TextColumn::make('lat')
                    ->label(__('admin.lat'))
                    ->toggleable()
                    ->toggledHiddenByDefault(),

                Tables\Columns\TextColumn::make('lng')
                    ->label(__('admin.lng'))
                    ->toggleable()
                    ->toggledHiddenByDefault(),

                Tables\Columns\TextColumn::make('price')
                    ->label(__('admin.price'))
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('admin.created_at'))
                    ->dateTime(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('admin.updated_at'))
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
            'index' => Pages\ListPlaygrounds::route('/'),
            'create' => Pages\CreatePlayground::route('/create'),
            'edit' => Pages\EditPlayground::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): string
    {
        return __('admin.playground');
    }

    public static function getPluralLabel(): string
    {
        return __('admin.playgrounds');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('admin.manage_playgrounds');
    }

    protected static function getNavigationBadge(): ?string
    {
        return self::getEloquentQuery()->count();
    }
}
