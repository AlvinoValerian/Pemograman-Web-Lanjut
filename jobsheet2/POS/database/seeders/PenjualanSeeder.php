<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penjualanData = [
            ['user_id' => 1, 'pembeli' => 'Ahmad', 'penjualan_kode' => 'PJ001'],
            ['user_id' => 2, 'pembeli' => 'Budi', 'penjualan_kode' => 'PJ002'],
            ['user_id' => 1, 'pembeli' => 'Siti', 'penjualan_kode' => 'PJ003'],
            ['user_id' => 3, 'pembeli' => 'Joko', 'penjualan_kode' => 'PJ004'],
            ['user_id' => 2, 'pembeli' => 'Lina', 'penjualan_kode' => 'PJ005'],
            ['user_id' => 1, 'pembeli' => 'Tono', 'penjualan_kode' => 'PJ006'],
            ['user_id' => 3, 'pembeli' => 'Dewi', 'penjualan_kode' => 'PJ007'],
            ['user_id' => 2, 'pembeli' => 'Sari', 'penjualan_kode' => 'PJ008'],
            ['user_id' => 1, 'pembeli' => 'Rahmat', 'penjualan_kode' => 'PJ009'],
            ['user_id' => 3, 'pembeli' => 'Hana', 'penjualan_kode' => 'PJ010'],
        ];

        foreach ($penjualanData as &$data) {
            $data['penjualan_tanggal'] = Carbon::now();
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
        }

        DB::table('t_penjualan')->insert($penjualanData);
    }
}
