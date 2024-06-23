<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservationResource\Pages;
use App\Filament\Resources\ReservationResource\RelationManagers;
use App\Models\Playground;
use App\Models\Reservation;
use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Resources\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('playground.name')
                    ->toggleable()
                    ->label(__('admin.playground')),

                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->toggleable()
                    ->label(__('admin.user')),

                Tables\Columns\TextColumn::make('date')
                    ->toggleable()
                    ->label(__('admin.date'))
                    ->date(),

                Tables\Columns\TagsColumn::make('times')
                    ->toggleable()
                    ->label(__('admin.time')),

                Tables\Columns\BadgeColumn::make('status')
                    ->formatStateUsing(fn(string $state): string => __("admin." . Str::lower($state)))
                    ->toggleable()
                    ->colors([
                        'primary' => fn($state): bool => $state == 'PENDING',
                        'danger' => fn($state): bool => $state == 'CANCELLED',
                        'success' => fn($state): bool => $state == 'CONFIRMED',
                    ])
                    ->label(__('admin.status')),

                Tables\Columns\BadgeColumn::make('payment_status')
                    ->formatStateUsing(fn(string $state): string => __("admin." . Str::lower($state)))
                    ->toggleable()
                    ->colors([
                        'primary' => fn($state): bool => $state == 'PENDING',
                        'danger' => fn($state): bool => $state == 'FAILED',
                        'success' => fn($state): bool => $state == 'PAID',
                    ])
                    ->label(__('admin.payment_status')),

                Tables\Columns\TextColumn::make('payment_reference')
                    ->toggleable()
                    ->toggledHiddenByDefault()
                    ->label(__('admin.payment_reference')),

                Tables\Columns\TextColumn::make('payment_amount')
                    ->toggleable()
                    ->toggledHiddenByDefault()
                    ->label(__('admin.amount')),

                Tables\Columns\TextColumn::make('payment_method')
                    ->toggleable()
                    ->toggledHiddenByDefault()
                    ->label(__('admin.payment_method')),

                Tables\Columns\TextColumn::make('created_at')
                    ->toggleable()
                    ->label(__('admin.created_at'))
                    ->dateTime(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->toggleable()
                    ->toggledHiddenByDefault()
                    ->label(__('admin.updated_at'))
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\MultiSelectFilter::make('playground_id')
                    ->options(PlaygroundResource::getEloquentQuery()->pluck('name', 'id'))
                    ->label(__('admin.playground')),
                Tables\Filters\Filter::make('date')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label(__('admin.starts_at')),
                        Forms\Components\DatePicker::make('created_until')
                            ->label(__('admin.ends_at')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('date', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('date', '<=', $date),
                            );
                    })
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->can('view_reservation')) {
            return parent::getEloquentQuery();
        }

        return parent::getEloquentQuery()->whereHas('playground', fn(Builder $query) => $query->whereBelongsTo(auth()->user()));
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\BelongsToSelect::make('playground_id')
                        ->disabled(static fn(HasForms $livewire): bool => ($livewire instanceof EditRecord) || (($livewire->mountedTableAction ?? '') === 'edit') || ($livewire->mountedAction ?? '') === 'edit')
                        ->relationship('playground', 'name', fn(Builder $query) => PlaygroundResource::getEloquentQuery())
                        ->afterStateUpdated(function ($set) {
                            $set('payment_amount', 0);
                            $set('times', []);
                        })
                        ->label(__('admin.playground'))
                        ->reactive()
                        ->required(),

                    Forms\Components\BelongsToSelect::make('user_id')
                        ->hint(__('admin.user_hint'))
                        ->disabled(static fn(HasForms $livewire): bool => ($livewire instanceof EditRecord) || (($livewire->mountedTableAction ?? '') === 'edit') || ($livewire->mountedAction ?? '') === 'edit')
                        ->relationship('user', 'name', fn(Builder $query) => UserResource::getEloquentQuery())
                        ->label(__('admin.user'))
                        ->nullable(),

                    Forms\Components\DatePicker::make('date')
                        ->disabled(static fn(HasForms $livewire): bool => ($livewire instanceof EditRecord) || (($livewire->mountedTableAction ?? '') === 'edit') || ($livewire->mountedAction ?? '') === 'edit')
                        ->label(__('admin.date'))
                        ->afterStateUpdated(function ($set) {
                            $set('payment_amount', 0);
                            $set('times', []);
                        })
                        ->minDate(now()->subDay())
                        ->reactive()
                        ->required(),

                    Forms\Components\Select::make('times')
                        ->multiple()
                        ->visibleOn(CreateRecord::class)
                        ->label(__('admin.time'))
                        ->preload()
                        ->afterStateUpdated(function ($state, callable $get, callable $set) {
                            /** @var Playground $playground */
                            $playground = Playground::find($get('playground_id'));
                            $playgroundTimes = $playground->getAvailableTimings($get('date'));

                            $reserveTimes = collect($playgroundTimes)
                                ->filter(function ($time) use ($get) {
                                    return in_array($time['time'], $get('times'));
                                });

                            $totalPrice = $reserveTimes->sum(function ($time) {
                                return $time['price'];
                            });

                            $set('payment_amount', $totalPrice);
                        })
                        ->reactive()
                        ->options(['ho' => 'aaa', 'hoo' => 'bbb'])
                        ->options(function ($get, $set) {
                            if (!$get('playground_id') || !$get('date')) return [];

                            /** @var Playground $playground */
                            $playground = Playground::find($get('playground_id'));
                            return collect($playground->getAvailableTimings($get('date')))->pluck('time', 'time')->toArray();
                        })
                        ->required(),

                    Forms\Components\TextInput::make('payment_reference')
                        ->visible(fn($get) => $get('payment_method') == 'card')
                        ->label(__('admin.payment_reference'))
                        ->disabled()
                        ->maxLength(191),

                    Forms\Components\TextInput::make('payment_amount')
                        ->disabled()
                        ->label(__('admin.amount'))
                        ->default(0)
                        ->numeric()
                        ->required(),

                    Forms\Components\Select::make('payment_method')
                        ->disabled()
                        ->reactive()
                        ->label(__('admin.payment_method'))
                        ->required()
                        ->default('cash')
                        ->options([
                            'cash' => __('admin.cash'),
                            'card' => __('admin.credit_card'),
                        ]),
                ]),

                Forms\Components\Card::make([Forms\Components\Select::make('status')
                    ->disabled(fn($get) => $get('payment_method') == 'card' && $get('payment_status') == 'PENDING')
                    ->label(__('admin.status'))
                    ->required()
                    ->default('PENDING')
                    ->options(['PENDING' => __('admin.pending'),
                        'CONFIRMED' => __('admin.confirmed'),
                        'CANCELLED' => __('admin.cancelled'),]),

                    Forms\Components\Select::make('payment_status')
                        ->disabled(fn($get) => $get('payment_method') == 'card')
                        ->required()
                        ->label(__('admin.payment_status'))
                        ->default('PENDING')
                        ->options(['PENDING' => __('admin.pending'),
                            'PAID' => __('admin.paid'),
                            'FAILED' => __('admin.failed'),]),]),]);
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
            'index' => Pages\ListReservations::route('/'),
            'create' => Pages\CreateReservation::route('/create'),
            'edit' => Pages\EditReservation::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): string
    {
        return __('admin.reservation');
    }

    public static function getPluralLabel(): string
    {
        return __('admin.reservations');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('admin.manage_reservations');
    }

    protected static function getNavigationBadge(): ?string
    {
        return self::getEloquentQuery()->count();
    }
}
