<?php

namespace App\Filament\Resources\IsiIndikatorResource\Pages;

use App\Filament\Resources\IsiIndikatorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIsiIndikator extends EditRecord
{
    protected static string $resource = IsiIndikatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

}
