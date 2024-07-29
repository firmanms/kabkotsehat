<?php

namespace App\Filament\Resources\MasterTatananResource\Pages;

use App\Filament\Resources\MasterTatananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMasterTatanan extends EditRecord
{
    protected static string $resource = MasterTatananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
