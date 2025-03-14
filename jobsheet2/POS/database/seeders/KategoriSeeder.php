<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['kategori_kode' => 'ELEK', 'kategori_nama' => 'Elektronik'],
            ['kategori_kode' => 'PAKA', 'kategori_nama' => 'Pakaian'],
            ['kategori_kode' => 'MAKA', 'kategori_nama' => 'Makanan'],
            ['kategori_kode' => 'MINU', 'kategori_nama' => 'Minuman'],
            ['kategori_kode' => 'OTOM', 'kategori_nama' => 'Otomotif'],
        ];

        DB::table('m_kategori')->insert($data);
    }
}
