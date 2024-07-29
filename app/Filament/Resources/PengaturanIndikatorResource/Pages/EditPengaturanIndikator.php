<?php

namespace App\Filament\Resources\PengaturanIndikatorResource\Pages;

use App\Filament\Resources\PengaturanIndikatorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengaturanIndikator extends EditRecord
{
    protected static string $resource = PengaturanIndikatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
