<?php

namespace App\Filament\Resources\LegalAspekResource\Pages;

use App\Filament\Resources\LegalAspekResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditLegalAspek extends EditRecord
{
    protected static string $resource = LegalAspekResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }

    protected function beforeFill()
    {
        // Asumsikan bahwa pengguna memiliki metode atau properti untuk mendapatkan role
        $roles = Auth::user()->roles->pluck('name'); // Atau metode lain jika berbeda
        $roleNames = $roles->implode(', ');
        // Mendapatkan user ID yang sedang login
        $userId = Auth::id();

        // Mendapatkan legalaspek yang sedang di-edit
        $legalaspek = $this->record;

        // Periksa apakah user yang sedang login memiliki hak akses untuk mengedit legalaspek
        if ($legalaspek->user_id !== $userId and $roleNames !== 'super_admin') {
            abort(403, 'Unauthorized action.');
        }
    }
}
