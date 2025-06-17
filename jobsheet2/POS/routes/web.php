<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::pattern('id', '[0-9]+'); //artinya ketika ada parameter {id}, maka harus berupo angka

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth'])->group(function () { //semua route di dalam group ini harus login dulu
    //masukkan semua route yang perlu autentifikasi kesini
    Route::get('/', [WelcomeController::class, 'index']);
    // route level

    //artrinya semua route di dalam group ini harus punya role ADM(administrator)
    Route::middleware(['authorize:ADM'])->group(function () {
        Route::get('/level',  [LevelController::class, 'index']);
        Route::get('/level/list', [LevelController::class, 'list']);
        Route::get('/level/create', [LevelController::class, 'create']);
        Route::post('/level', [LevelController::class, 'store']);
        Route::get('/level/create_ajax', [LevelController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
        Route::post('/level/ajax', [LevelController::class, 'store_ajax']);
        Route::get('/level/{id}', [LevelController::class, 'show']);
        Route::get('/level/{id}/show_ajax', [LevelController::class, 'show_ajax']);
        Route::get('/level/{id}/edit', [LevelController::class, 'edit']);
        Route::put('/level/{id}', [LevelController::class, 'update']);
        Route::get('/level/{id}/edit_ajax', [LevelController::class, 'edit_ajax']); // Menampilkan halaman form edit user Ajax
        Route::put('/level/{id}/update_ajax', [LevelController::class, 'update_ajax']); // Menyimpan perubahan data user Ajax
        Route::get('/level/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); // untuk tampilkan form confirm delete user Ajax
        Route::delete('/level/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); // Untuk hapus data user Ajax
        Route::delete('/level/{id}', [LevelController::class, 'destroy']);
        Route::get('level/import', [LevelController::class, 'import']); // ajax form uplod excel
        Route::post('level/import_ajax', [LevelController::class, 'import_ajax']); //ajax import excel
    });
    Route::middleware(['authorize:ADM,MNG'])->group(function () {
        Route::get('/barang',  [BarangController::class, 'index']);
        Route::get('/barang/list', [BarangController::class, 'list']);
        Route::get('/barang/create', [BarangController::class, 'create']);
        Route::post('/barang', [BarangController::class, 'store']);
        Route::get('/barang/create_ajax', [BarangController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
        Route::post('/barang/ajax', [BarangController::class, 'store_ajax']);
        Route::get('/barang/{id}', [BarangController::class, 'show']);
        Route::get('/barang/{id}/show_ajax', [BarangController::class, 'show_ajax']);
        Route::get('/barang/{id}/edit', [BarangController::class, 'edit']);
        Route::put('/barang/{id}', [BarangController::class, 'update']);
        Route::get('/barang/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); // Menampilkan halaman form edit user Ajax
        Route::put('/barang/{id}/update_ajax', [BarangController::class, 'update_ajax']); // Menyimpan perubahan data user Ajax
        Route::get('/barang/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); // untuk tampilkan form confirm delete user Ajax
        Route::delete('/barang/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); // Untuk hapus data user Ajax
        Route::delete('/barang/{id}', [BarangController::class, 'destroy']);
        Route::get('/barang/import', [BarangController::class, 'import']); // ajax form uplod excel
        Route::post('/barang/import_ajax', [BarangController::class, 'import_ajax']); //ajax import excel
    });
});




Route::prefix('product')->group(function () {
    Route::get('/category/food-beverage', [ProductController::class, 'food_beverage']);
    Route::get('/category/beauty-health', [ProductController::class, 'beauty_health']);
    Route::get('/category/home-care', [ProductController::class, 'home_care']);
    Route::get('/category/baby-kid', [ProductController::class, 'baby_kid']);
});

Route::get('user/{id}/name/{name}', [UserController::class, 'index']);

// Route::get('penjualan', [PenjualanController::class, 'index']);

// Route::get('/level', [LevelController::class, 'index']);

// Route::get('/kategori', [KategoriController::class, 'index']);

// Route::get('/user', [UserController::class, 'index']);

// Route::get ('/user/tambah', [UserController::class, 'tambah']);

// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);

// Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);

// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);

// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/',  [UserController::class, 'index']);
    Route::get('/list', [UserController::class, 'list']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/create_ajax', [UserController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
    Route::post('/ajax', [UserController::class, 'store_ajax']); // Menyimpan data user baru Ajax
    Route::get('/{id}', [UserController::class, 'show']);
    Route::get('/{id}/show_ajax', [UserController::class, 'show_ajax']);
    Route::get('/{id}/edit', [UserController::class, 'edit']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']); // Menampilkan halaman form edit user Ajax
    Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']); // Menyimpan perubahan data user Ajax
    Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); // untuk tampilkan form confirm delete user Ajax
    Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // Untuk hapus data user Ajax
    Route::delete('/{id}', [UserController::class, 'destroy']);
    Route::get('/import', [UserController::class, 'import']); // ajax form uplod excel
    Route::post('/import_ajax', [UserController::class, 'import_ajax']); //ajax import excel
});

// Route::group(['prefix' => 'level'], function () {
//     Route::get('/',  [LevelController::class, 'index']);
//     Route::get('/list', [LevelController::class, 'list']);
//     Route::get('/create', [LevelController::class, 'create']);
//     Route::post('/', [LevelController::class, 'store']);
//     Route::get('/create_ajax', [LevelController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
//     Route::post('/ajax', [LevelController::class, 'store_ajax']);
//     Route::get('/{id}', [LevelController::class, 'show']);
//     Route::get('/{id}/show_ajax', [LevelController::class, 'show_ajax']);
//     Route::get('/{id}/edit', [LevelController::class, 'edit']);
//     Route::put('/{id}', [LevelController::class, 'update']);
//     Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']); // Menampilkan halaman form edit user Ajax
//     Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']); // Menyimpan perubahan data user Ajax
//     Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); // untuk tampilkan form confirm delete user Ajax
//     Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); // Untuk hapus data user Ajax
//     Route::delete('/{id}', [LevelController::class, 'destroy']);
// });

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/',  [KategoriController::class, 'index']);
    Route::get('/list', [KategoriController::class, 'list']);
    Route::get('/create', [KategoriController::class, 'create']);
    Route::post('/', [KategoriController::class, 'store']);
    Route::get('/create_ajax', [KategoriController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
    Route::post('/ajax', [KategoriController::class, 'store_ajax']);
    Route::get('/{id}', [KategoriController::class, 'show']);
    Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']);
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/{id}', [KategoriController::class, 'update']);
    Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']); // Menampilkan halaman form edit user Ajax
    Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']); // Menyimpan perubahan data user Ajax
    Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']); // untuk tampilkan form confirm delete user Ajax
    Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']); // Untuk hapus data user Ajax
    Route::delete('/{id}', [KategoriController::class, 'destroy']);
    Route::get('/import', [KategoriController::class, 'import']); // ajax form uplod excel
    Route::post('/import_ajax', [KategoriController::class, 'import_ajax']); //ajax import excel
});

// Route::group(['prefix' => 'barang'], function () {
//     Route::get('/',  [BarangController::class, 'index']);
//     Route::get('/list', [BarangController::class, 'list']);
//     Route::get('/create', [BarangController::class, 'create']);
//     Route::post('/', [BarangController::class, 'store']);
//     Route::get('/create_ajax', [BarangController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
//     Route::post('/ajax', [BarangController::class, 'store_ajax']);
//     Route::get('/{id}', [BarangController::class, 'show']);
//     Route::get('/{id}/show_ajax', [BarangController::class, 'show_ajax']);
//     Route::get('/{id}/edit', [BarangController::class, 'edit']);
//     Route::put('/{id}', [BarangController::class, 'update']);
//     Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); // Menampilkan halaman form edit user Ajax
//     Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']); // Menyimpan perubahan data user Ajax
//     Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); // untuk tampilkan form confirm delete user Ajax
//     Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); // Untuk hapus data user Ajax
//     Route::delete('/{id}', [BarangController::class, 'destroy']);
// });

Route::group(['prefix' => 'supplier'], function () {
    Route::get('/',  [SupplierController::class, 'index']);
    Route::get('/list', [SupplierController::class, 'list']);
    Route::get('/create', [SupplierController::class, 'create']);
    Route::post('/', [SupplierController::class, 'store']);
    Route::get('/create_ajax', [SupplierController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
    Route::post('/ajax', [SupplierController::class, 'store_ajax']);
    Route::get('/{id}', [SupplierController::class, 'show']);
    Route::get('/{id}/show_ajax', [SupplierController::class, 'show_ajax']);
    Route::get('/{id}/edit', [SupplierController::class, 'edit']);
    Route::put('/{id}', [SupplierController::class, 'update']);
    Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']); // Menampilkan halaman form edit user Ajax
    Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']); // Menyimpan perubahan data user Ajax
    Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']); // untuk tampilkan form confirm delete user Ajax
    Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']); // Untuk hapus data user Ajax
    Route::delete('/{id}', [SupplierController::class, 'destroy']);
    Route::get('/import', [SupplierController::class, 'import']); // ajax form uplod excel
    Route::post('/import_ajax', [SupplierController::class, 'import_ajax']); //ajax import excel
});
