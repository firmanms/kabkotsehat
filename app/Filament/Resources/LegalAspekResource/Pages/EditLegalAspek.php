<?php

namespace App\Filament\Resources\LegalAspekResource\Pages;

use App\Filament\Resources\LegalAspekResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLegalAspek extends EditRecord
{
    protected static string $resource = LegalAspekResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
