<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run()
    {
        DB::table('m_barang')->insert([
            // Kategori 1: SUV
            ['kategori_id' => 1, 'barang_kode' => 'MBL001', 'barang_nama' => 'Toyota Fortuner', 'harga_beli' => 450000000, 'harga_jual' => 500000000],
            ['kategori_id' => 1, 'barang_kode' => 'MBL002', 'barang_nama' => 'Mitsubishi Pajero Sport', 'harga_beli' => 480000000, 'harga_jual' => 530000000],

            // Kategori 2: Sedan
            ['kategori_id' => 2, 'barang_kode' => 'MBL003', 'barang_nama' => 'Honda Civic', 'harga_beli' => 350000000, 'harga_jual' => 390000000],
            ['kategori_id' => 2, 'barang_kode' => 'MBL004', 'barang_nama' => 'Toyota Camry', 'harga_beli' => 400000000, 'harga_jual' => 450000000],

            // Kategori 3: Hatchback
            ['kategori_id' => 3, 'barang_kode' => 'MBL005', 'barang_nama' => 'Honda Jazz', 'harga_beli' => 250000000, 'harga_jual' => 280000000],
            ['kategori_id' => 3, 'barang_kode' => 'MBL006', 'barang_nama' => 'Toyota Yaris', 'harga_beli' => 240000000, 'harga_jual' => 270000000],

            // Kategori 4: MPV
            ['kategori_id' => 4, 'barang_kode' => 'MBL007', 'barang_nama' => 'Toyota Avanza', 'harga_beli' => 200000000, 'harga_jual' => 230000000],
            ['kategori_id' => 4, 'barang_kode' => 'MBL008', 'barang_nama' => 'Mitsubishi Xpander', 'harga_beli' => 230000000, 'harga_jual' => 260000000],

            // Kategori 5: Truk
            ['kategori_id' => 5, 'barang_kode' => 'MBL009', 'barang_nama' => 'Isuzu Traga', 'harga_beli' => 300000000, 'harga_jual' => 340000000],
            ['kategori_id' => 5, 'barang_kode' => 'MBL010', 'barang_nama' => 'Mitsubishi Canter', 'harga_beli' => 400000000, 'harga_jual' => 450000000],
        ]);
    }
}
