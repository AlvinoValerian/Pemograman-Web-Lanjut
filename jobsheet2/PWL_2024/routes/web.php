<?php

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

Route::get('/hello', function () {
    return ('Hello World');
});

Route::get('/world', function () {
    return 'World';
});

Route::get('/',function (){
    return 'Selamat Datang';
});

Route::get('/about',function (){
    return 'Nim: 2341720027  Nama: Alvino Valerian D.R';

});