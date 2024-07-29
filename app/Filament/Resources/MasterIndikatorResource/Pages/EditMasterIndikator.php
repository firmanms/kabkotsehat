<?php

namespace App\Filament\Resources\MasterIndikatorResource\Pages;

use App\Filament\Resources\MasterIndikatorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMasterIndikator extends EditRecord
{
    protected static string $resource = MasterIndikatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
