<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['kategori_kode' => 'SUV', 'kategori_nama' => 'SUV (Sport Utility Vehicle)'],
            ['kategori_kode' => 'SED', 'kategori_nama' => 'Sedan'],
            ['kategori_kode' => 'HAT', 'kategori_nama' => 'Hatchback'],
            ['kategori_kode' => 'MPV', 'kategori_nama' => 'MPV (Multi Purpose Vehicle)'],
            ['kategori_kode' => 'TRK', 'kategori_nama' => 'Truk'],
        ];

        DB::table('m_kategori')->insert($data);
    }
}
