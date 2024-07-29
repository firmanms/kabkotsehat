<?php

namespace App\Filament\Resources\IsiIndikatorResource\Pages;

use App\Filament\Resources\IsiIndikatorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIsiIndikators extends ListRecords
{
    protected static string $resource = IsiIndikatorResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

}
