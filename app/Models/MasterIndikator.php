<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterIndikator extends Model
{
    use HasFactory;
    protected $fillable = [
        'master_tatanans_id',
        'pertanyaan',
        'jenis',
        'detail',
        'sumberdata',
        'dokumenpendukung',
    ];
    
    public function masterTatanan()
    {
        return $this->belongsTo(MasterTatanan::class, 'master_tatanans_id');
    }

    public function masterJawabanIndikators()
    {
        return $this->hasMany(MasterJawabanIndikator::class, 'master_indikators_id');
    }

    public function pengaturanIndikators()
    {
    return $this->hasMany(PengaturanIndikator::class, 'master_indikators_id');
    }
}
