<?php

namespace App\Filament\Resources\PengaturanIndikatorResource\Pages;

use App\Filament\Resources\PengaturanIndikatorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPengaturanIndikators extends ListRecords
{
    protected static string $resource = PengaturanIndikatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
