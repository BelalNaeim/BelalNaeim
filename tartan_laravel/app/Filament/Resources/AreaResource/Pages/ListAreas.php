<?php

namespace App\Filament\Resources\AreaResource\Pages;

use App\Filament\Resources\AreaResource;
use Filament\Resources\Pages\ListRecords;

class ListAreas extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = AreaResource::class;
}
