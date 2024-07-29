<?php

namespace App\Filament\Widgets;

use App\Models\PengaturanIndikator;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StatsOverview extends BaseWidget
{
    public function getTotalScore(): int
    {
        $tatananId = 1; // Ganti dengan ID pengisi yang sesuai

        return DB::table('pengaturan_indikators as iset')
            ->join('master_indikators as iq', 'iq.id', '=', 'iset.master_indikators_id')
            ->join('master_jawaban_indikators as ia', 'ia.master_indikators_id', '=', 'iq.id')
            ->join('master_tatanans as t', 't.id', '=', 'iq.master_tatanans_id')
            ->where('iset.master_tatanans_id', $tatananId)
            ->where('iset.master_jawaban_indikators_id','=','ia.id')
            ->sum('ia.score');
    }

    protected function getStats(): array
    {
        $tatanan1=$this->getTotalScore();
        return [
        Stat::make('Kehidupan Masyarakat Sehat Mandiri',$tatanan1)
            ->description('Tatanan 1'),
        Stat::make('Permukiman Dan Rumah Ibadat', '0%')
            ->description('Tatanan 2'),
        Stat::make('Pasar Rakyat', '0%')
            ->description('Tatanan 3'),
        Stat::make('Satuan Pendidikan', '0%')
            ->description('Tatanan 4'),
        Stat::make('Pariwisata', '0%')
            ->description('Tatanan 5'),
        Stat::make('Transportasi Dan Tertib Lalu Lintas Jalan', '0%')
            ->description('Tatanan 6'),
        Stat::make('Perkantoran Dan Perindustrian', '0%')
            ->description('Tatanan 7'),
        Stat::make('Perlindungan Sosial', '0%')
            ->description('Tatanan 8'),
            Stat::make('Pencegahan Dan Penanganan Bencana', '0%')
            ->description('Tatanan 9'),
        ];
    }
}
