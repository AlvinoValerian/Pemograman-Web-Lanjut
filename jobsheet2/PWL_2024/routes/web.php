<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\WelcomeController;
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

// Route::get('/hello', function () {
//     return ('Hello World');
// });
Route::get('/hello', [WelcomeController::class,'hello']);

Route::get('/world', function () {
    return 'World';
});

// Route::get('/',function (){
//     return 'Selamat Datang';
// });

Route::get('/', [PageController::class,'index']);

// Route::get('/about',function (){
//     return 'Nim: 2341720027  Nama: Alvino Valerian D.R';

// });
Route::get('/about', [PageController::class,'about']);

Route::get('/user/{name}',function ($name){
    return 'Nama Saya '.$name;

});

Route::get('/posts/{post}/comments/{comment}',function 
($postId,$commentId){
    return 'Post ke- '.$postId." Komentar ke-: ".$commentId;

});

// Route::get('/articles/{id}', function ($id) {
//     return "Halaman Artikel dengan ID $id";
// });
Route::get('/articles/{id}', [PageController::class,'articles']);

Route::get('/user/{name?}', function ($name=null) {
    return 'Nama Saya '.$name;
});

Route::get('/user/{name?}', function ($name='John') {
    return 'Nama Saya '.$name;
});
