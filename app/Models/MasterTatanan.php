<?php

namespace App\Models;

use App\Models\MasterIndikator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterTatanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'catatan',
    ];

    public function masterIndikators()
    {
        return $this->hasMany(MasterIndikator::class, 'master_tatanans_id');
    }

    public function pengaturanIndikators()
    {
    return $this->hasMany(PengaturanIndikator::class, 'master_tatanans_id');
    }
}
