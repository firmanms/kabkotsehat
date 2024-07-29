<?php

namespace Database\Seeders;

use App\Models\MasterTatanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterTatananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasterTatanan::create([
            'name' => 'Kehidupan Masyarakat Sehat Mandiri',
            'catatan' => '-',
        ]);

        MasterTatanan::create([
            'name' => 'Permukiman Dan Rumah Ibadat',
            'catatan' => '-',
        ]);

        MasterTatanan::create([
            'name' => 'Pasar Rakyat',
            'catatan' => '-',
        ]);

        MasterTatanan::create([
            'name' => 'Satuan Pendidikan',
            'catatan' => '-',
        ]);

        MasterTatanan::create([
            'name' => 'Pariwisata',
            'catatan' => '-',
        ]);

        MasterTatanan::create([
            'name' => 'Transportasi Dan Tertib Lalu Lintas Jalan',
            'catatan' => '-',
        ]);

        MasterTatanan::create([
            'name' => 'Perkantoran Dan Perindustrian',
            'catatan' => '-',
        ]);

        MasterTatanan::create([
            'name' => 'Perlindungan Sosial',
            'catatan' => '-',
        ]);

        MasterTatanan::create([
            'name' => 'Pencegahan Dan Penanganan Bencana',
            'catatan' => '-',
        ]);
    }
}
