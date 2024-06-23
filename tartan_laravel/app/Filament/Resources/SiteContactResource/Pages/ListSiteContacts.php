<?php

namespace App\Filament\Resources\SiteContactResource\Pages;

use App\Exports\SiteContactsExport;
use App\Filament\Resources\SiteContactResource;
use Filament\Pages\Actions\ButtonAction;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;

class ListSiteContacts extends ListRecords
{
    protected static string $resource = SiteContactResource::class;
}
