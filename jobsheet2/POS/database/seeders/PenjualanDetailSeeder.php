<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua ID dari penjualan dan barang
        $penjualanIDs = DB::table('t_penjualan')->pluck('penjualan_id')->toArray();
        $barangIDs = DB::table('m_barang')->pluck('barang_id')->toArray();

        if (count($penjualanIDs) < 10 || count($barangIDs) < 3) {
            dd("Pastikan ada minimal 10 transaksi penjualan dan 3 barang!");
        }

        $data = [];

        foreach ($penjualanIDs as $penjualanID) {
            // Ambil 3 barang secara acak untuk setiap transaksi
            $selectedBarang = array_rand($barangIDs, 3);
            
            foreach ($selectedBarang as $key) {
                $barangID = $barangIDs[$key];

                $data[] = [
                    'penjualan_id' => $penjualanID,
                    'barang_id' => $barangID,
                    'harga' => rand(5000, 50000),
                    'jumlah' => rand(1, 5),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert data ke database
        DB::table('t_penjualan_detail')->insert($data);
    }
}
