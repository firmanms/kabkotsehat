<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterJawabanIndikator extends Model
{
    use HasFactory;
    protected $fillable = [
        'master_indikators_id',
        'jawaban',
        'score',
    ];
    
    public function masterIndikator()
    {
        return $this->belongsTo(MasterIndikator::class, 'master_indikators_id');
    }

    public function pengaturanIndikators()
    {
        return $this->hasMany(PengaturanIndikator::class, 'master_jawaban_indikators_id');
    }


}
