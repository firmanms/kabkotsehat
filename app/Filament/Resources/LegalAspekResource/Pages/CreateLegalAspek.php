<?php

namespace App\Filament\Resources\LegalAspekResource\Pages;

use App\Filament\Resources\LegalAspekResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLegalAspek extends CreateRecord
{
    protected static string $resource = LegalAspekResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}
