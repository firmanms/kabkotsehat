<?php

namespace App\Filament\Resources\MasterIndikatorResource\Pages;

use App\Filament\Resources\MasterIndikatorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMasterIndikators extends ListRecords
{
    protected static string $resource = MasterIndikatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
