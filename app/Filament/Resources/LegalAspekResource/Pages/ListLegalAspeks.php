<?php

namespace App\Filament\Resources\LegalAspekResource\Pages;

use App\Filament\Resources\LegalAspekResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListLegalAspeks extends ListRecords
{
    protected static string $resource = LegalAspekResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }
    
}
