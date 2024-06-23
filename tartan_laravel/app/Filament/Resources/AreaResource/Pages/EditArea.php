<?php

namespace App\Filament\Resources\AreaResource\Pages;

use App\Filament\Resources\AreaResource;
use Filament\Resources\Pages\EditRecord;

class EditArea extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = AreaResource::class;
}
