<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run()
    {
        DB::table('m_barang')->insert([
            // Barang dari Supplier 1
            ['kategori_id' => 1, 'barang_kode' => 'BRG001', 'barang_nama' => 'Laptop', 'harga_beli' => 5000000, 'harga_jual' => 6000000],
            ['kategori_id' => 1, 'barang_kode' => 'BRG002', 'barang_nama' => 'Mouse', 'harga_beli' => 50000, 'harga_jual' => 75000],
            ['kategori_id' => 1, 'barang_kode' => 'BRG003', 'barang_nama' => 'Keyboard', 'harga_beli' => 100000, 'harga_jual' => 150000],
            ['kategori_id' => 1, 'barang_kode' => 'BRG004', 'barang_nama' => 'Monitor', 'harga_beli' => 1500000, 'harga_jual' => 2000000],
            ['kategori_id' => 1, 'barang_kode' => 'BRG005', 'barang_nama' => 'Printer', 'harga_beli' => 1200000, 'harga_jual' => 1800000],

            // Barang dari Supplier 2
            ['kategori_id' => 2, 'barang_kode' => 'BRG006', 'barang_nama' => 'Kaos Polos', 'harga_beli' => 25000, 'harga_jual' => 50000],
            ['kategori_id' => 2, 'barang_kode' => 'BRG007', 'barang_nama' => 'Jaket Hoodie', 'harga_beli' => 150000, 'harga_jual' => 200000],
            ['kategori_id' => 2, 'barang_kode' => 'BRG008', 'barang_nama' => 'Celana Jeans', 'harga_beli' => 180000, 'harga_jual' => 250000],
            ['kategori_id' => 2, 'barang_kode' => 'BRG009', 'barang_nama' => 'Sepatu Sneakers', 'harga_beli' => 300000, 'harga_jual' => 450000],
            ['kategori_id' => 2, 'barang_kode' => 'BRG010', 'barang_nama' => 'Tas Ransel', 'harga_beli' => 100000, 'harga_jual' => 150000],

            // Barang dari Supplier 3
            ['kategori_id' => 3, 'barang_kode' => 'BRG011', 'barang_nama' => 'Nasi Goreng', 'harga_beli' => 10000, 'harga_jual' => 20000],
            ['kategori_id' => 3, 'barang_kode' => 'BRG012', 'barang_nama' => 'Mie Ayam', 'harga_beli' => 8000, 'harga_jual' => 15000],
            ['kategori_id' => 3, 'barang_kode' => 'BRG013', 'barang_nama' => 'Bakso', 'harga_beli' => 12000, 'harga_jual' => 25000],
            ['kategori_id' => 3, 'barang_kode' => 'BRG014', 'barang_nama' => 'Kopi Susu', 'harga_beli' => 5000, 'harga_jual' => 15000],
            ['kategori_id' => 3, 'barang_kode' => 'BRG015', 'barang_nama' => 'Teh Botol', 'harga_beli' => 3000, 'harga_jual' => 8000],
        ]);
    }
}
