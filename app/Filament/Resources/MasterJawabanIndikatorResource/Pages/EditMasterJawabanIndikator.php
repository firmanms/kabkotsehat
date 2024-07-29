<?php

namespace App\Filament\Resources\MasterJawabanIndikatorResource\Pages;

use App\Filament\Resources\MasterJawabanIndikatorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMasterJawabanIndikator extends EditRecord
{
    protected static string $resource = MasterJawabanIndikatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
