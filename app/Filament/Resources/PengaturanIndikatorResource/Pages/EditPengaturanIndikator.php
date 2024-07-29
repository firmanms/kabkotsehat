<?php

namespace App\Filament\Resources\PengaturanIndikatorResource\Pages;

use App\Filament\Resources\PengaturanIndikatorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditPengaturanIndikator extends EditRecord
{
    protected static string $resource = PengaturanIndikatorResource::class;

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

        // Mendapatkan isianindikator yang sedang di-edit
        $isianindikator = $this->record;

        // Periksa apakah user yang sedang login memiliki hak akses untuk mengedit isianindikator
        if ($isianindikator->pengisi_id !== $userId and $isianindikator->koordinator_id !== $userId and $roleNames !== 'super_admin') {
            abort(403, 'Unauthorized action.');
        }
    }
}
