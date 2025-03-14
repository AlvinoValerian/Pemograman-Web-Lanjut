<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['supplier_kode' => 'SP001', 'supplier_nama' => 'vino', 'supplier_alamat' => 'Jl. A No.1'],
            ['supplier_kode' => 'SP002', 'supplier_nama' => 'abdul', 'supplier_alamat' => 'Jl. B No.2'],
            ['supplier_kode' => 'SP003', 'supplier_nama' => 'Wahyu', 'supplier_alamat' => 'Jl. C No.3'],
        ];

        DB::table('m_supplier')->insert($data);
    }
}
