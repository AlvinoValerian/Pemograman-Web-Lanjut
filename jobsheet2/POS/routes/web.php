<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\WelcomeController;


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


Route::get('/', [HomeController::class, '__invoke']);

Route::prefix('/category')->group(function () {
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage']);
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth']);
    Route::get('/home-care', [ProductController::class, 'homeCare']);
    Route::get('/baby-kid', [ProductController::class, 'babyKid']);
});


// Route::get('/user/{id}/name/{name}', [UserController::class, 'show']);

// Route::get('/sales', [SalesController::class, '__invoke']);

// Route::get('/level',[LevelController::class, 'index']);
// Route::get('/kategori',[KategoriController::class, 'index']);
// Route::get('/user',[UserController::class, 'index']);

// Route::get('/user/tambah', [UserController::class, 'tambah']);
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);

// Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);

// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);
Route::get('/', [WelcomeController::class, 'index']);
Route::group(['prefix' => 'user'], function () {
    // Menampilkan halaman awal daftar user
    Route::get('/', [UserController::class, 'index']);

    // Menampilkan data user dalam format JSON untuk digunakan oleh DataTables
    Route::get('/list', [UserController::class, 'list']);

    // Menampilkan halaman formulir untuk membuat user baru
    Route::get('/create', [UserController::class, 'create']);

    // Menyimpan data user baru ke database
    Route::post('/', [UserController::class, 'store']);

    // Menampilkan detail informasi user berdasarkan ID
    Route::get('/{id}', [UserController::class, 'show']);

    // Menampilkan halaman formulir untuk mengedit data user berdasarkan ID
    Route::get('/{id}/edit', [UserController::class, 'edit']);

    // Memperbarui data user yang sudah ada di database berdasarkan ID
    Route::put('/{id}', [UserController::class, 'update']);

    // Menghapus data user dari database berdasarkan ID
    Route::delete('/{id}', [UserController::class, 'destroy']);
});