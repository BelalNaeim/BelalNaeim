<?php

namespace App\Filament\Resources\PlaygroundResource\Pages;

use App\Filament\Resources\PlaygroundResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePlayground extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = PlaygroundResource::class;
}
