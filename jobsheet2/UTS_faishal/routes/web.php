<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'user'], function() {
    Route::get('/',  [UserController::class, 'index']);
    Route::post('/create',  [UserController::class, 'store']);
    Route::put('/{id}/update', [UserController::class, 'update']);
    Route::delete('/{id}/delete', [UserController::class, 'destroy']);
});

Route::group(['prefix' => 'books'], function() {
    Route::get('/',  [BookController::class, 'index']);
    Route::post('/create',  [BookController::class, 'store']);
    Route::put('/{id}/update', [BookController::class, 'update']);
    Route::delete('/{id}/delete', [BookController::class, 'destroy']);
});

Route::prefix('rentals')->group(function () {
    Route::get('/', [RentalController::class, 'index'])->name('rentals.index');
    Route::post('/create', [RentalController::class, 'store'])->name('rentals.store');
    Route::put('/{id}/update', [RentalController::class, 'update'])->name('rentals.update');
    Route::delete('/{id}/delete', [RentalController::class, 'destroy'])->name('rentals.destroy');
});

