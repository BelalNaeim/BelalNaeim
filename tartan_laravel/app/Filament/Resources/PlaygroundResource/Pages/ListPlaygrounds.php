<?php

namespace App\Filament\Resources\PlaygroundResource\Pages;

use App\Filament\Resources\PlaygroundResource;
use Filament\Resources\Pages\ListRecords;

class ListPlaygrounds extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = PlaygroundResource::class;
}
