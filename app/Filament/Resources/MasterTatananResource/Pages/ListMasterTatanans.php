<?php

namespace App\Filament\Resources\MasterTatananResource\Pages;

use App\Filament\Resources\MasterTatananResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMasterTatanans extends ListRecords
{
    protected static string $resource = MasterTatananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
