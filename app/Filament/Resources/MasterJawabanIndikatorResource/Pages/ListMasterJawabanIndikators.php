<?php

namespace App\Filament\Resources\MasterJawabanIndikatorResource\Pages;

use App\Filament\Resources\MasterJawabanIndikatorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMasterJawabanIndikators extends ListRecords
{
    protected static string $resource = MasterJawabanIndikatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
