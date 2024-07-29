<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaturanIndikator extends Model
{
    use HasFactory;
    protected $fillable = [
        'master_tatanans_id',
        'master_indikators_id',
        'master_jawaban_indikators_id',
        'file_bukti',
        'penghargaan',
        'file_bukti_penghargaan',
        'assesment_provinsi',
        'assesment_nasional',
        'catatan_anggota',
        'catatan_koordinator',
        'catatan_pembina',
        'catatan_provinsi',
        'catatan_nasional',
        'pengisi_id',
        'koordinator_id',
    ];

    // Relasi dengan tabel master_tatanans
    public function masterTatanan()
    {
        return $this->belongsTo(MasterTatanan::class, 'master_tatanans_id');
    }
    // Relasi dengan tabel master_indikators
    public function masterIndikator()
    {
        return $this->belongsTo(MasterIndikator::class, 'master_indikators_id');
    }
    // Relasi dengan tabel master_jawaban_indikators
    public function masterJawabanIndikator()
    {
        return $this->belongsTo(MasterJawabanIndikator::class, 'master_jawaban_indikators_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pengisi()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeAssignedToUser(Builder $query, $userId)
    {
        return $query->where('pengisi_id', $userId);
    }

    public function koordinator()
    {
        return $this->belongsTo(User::class);
    }
}
