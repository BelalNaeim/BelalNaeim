<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Shield\RoleResource;
use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use STS\FilamentImpersonate\Impersonate;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?int $navigationSort = 9;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(self::getForm());
    }

    public static function getForm(): array
    {
        return [
            Forms\Components\Card::make([
                Forms\Components\Placeholder::make('general_info')
                    ->label(__('admin.general_info'))
                    ->content(__('admin.general_info_hint')),

                TextInput::make('name')
                    ->label(__('admin.name'))
                    ->required(),
                TextInput::make('email')
                    ->label(__('admin.email'))
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->label(__('admin.phone'))
                    ->tel()
                    ->required(),
                Forms\Components\TextInput::make('password')
                    ->label(__('admin.password'))
                    ->password()
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn($state) => !empty($state) ? Hash::make($state) : ""),
                Forms\Components\BelongsToManyMultiSelect::make('roles')
                    ->label(__('filament-shield::filament-shield.resource.label.roles'))
                    ->relationship('roles', 'name', fn(Builder $query) => RoleResource::getEloquentQuery()),
            ])->label(__('admin.general_info')),

            Forms\Components\Card::make([
                Forms\Components\Placeholder::make('bank_info')
                    ->label(__('admin.bank_info'))
                    ->content(__('admin.bank_info_hint')),

                TextInput::make('bank_name')
                    ->label(__('admin.bank_name'))
                    ->nullable(),
                TextInput::make('iban')
                    ->label(__('admin.iban'))
                    ->nullable(),
                TextInput::make('account_name')
                    ->label(__('admin.account_name'))
                    ->nullable(),
                TextInput::make('swift_code')
                    ->label(__('admin.swift_code'))
                    ->nullable(),
            ])->label(__('admin.bank_info')),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label(__('admin.id'))
                    ->sortable(),
                TextColumn::make('name')
                    ->label(__('admin.name'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')
                    ->label(__('admin.email'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('phone')
                    ->label(__('admin.phone'))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('roles')
                    ->label(__('filament-shield::filament-shield.resource.label.roles'))
                    ->getStateUsing(fn($record) => implode(', ', $record->roles->pluck('name')->toArray())),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('admin.created_at'))
                    ->dateTime('M j, Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('admin.updated_at'))
                    ->dateTime('M j, Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('verified')
                    ->label(__('admin.verified'))
                    ->query(fn(Builder $query): Builder => $query->whereNotNull('email_verified_at')),
                Tables\Filters\Filter::make('unverified')
                    ->label(__('admin.unverified'))
                    ->query(fn(Builder $query): Builder => $query->whereNull('email_verified_at')),
            ])->prependActions([
                Impersonate::make('impersonate')
                    ->label(__('admin.impersonate'))
                    ->icon('heroicon-o-user'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): string
    {
        return __('admin.user');
    }

    public static function getPluralLabel(): string
    {
        return __('admin.users');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('admin.manage_users');
    }

    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->can('view_user')) {
            return parent::getEloquentQuery();
        }

        return parent::getEloquentQuery()->where('id', auth()->id());
    }

    protected static function getNavigationBadge(): ?string
    {
        return self::getEloquentQuery()->count();
    }
}
