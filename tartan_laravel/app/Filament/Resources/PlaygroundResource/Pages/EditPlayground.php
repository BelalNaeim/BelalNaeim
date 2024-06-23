<?php

namespace App\Filament\Resources\PlaygroundResource\Pages;

use App\Filament\Resources\PlaygroundResource;
use Filament\Resources\Pages\EditRecord;

class EditPlayground extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = PlaygroundResource::class;
}
