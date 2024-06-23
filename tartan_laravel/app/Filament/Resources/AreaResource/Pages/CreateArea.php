<?php

namespace App\Filament\Resources\AreaResource\Pages;

use App\Filament\Resources\AreaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateArea extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = AreaResource::class;
}
