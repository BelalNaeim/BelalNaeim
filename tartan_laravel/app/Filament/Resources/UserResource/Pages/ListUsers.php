<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

//    public function export()
//    {
//        return Excel::download(new UsersExport, 'users.xlsx');
//    }
//
//    protected function getActions(): array
//    {
//        return array_merge(parent::getActions(), [
//            ButtonAction::make('export')->action('export'),
//        ]);
//    }
}
