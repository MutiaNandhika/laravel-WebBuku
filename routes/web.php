<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

//HAK AKSES UNTUK SEMUA
Route::get('/buku', [BukuController::class, 'index'])->name('buku');
Route::get('/buku/detail/{id_buku}', [BukuController::class, 'detail']);

Route::get('/search', [BukuController::class, 'search']);

//HAK AKSES UNTUK ADMIN
Route::group(['middleware' => 'admin'], function () {

    //buku
    Route::get('/buku/add', [BukuController::class, 'add']);
    Route::post('/buku/insert', [BukuController::class, 'insert']);
    Route::get('/buku/edit/{id_buku}', [BukuController::class, 'edit']);
    Route::post('/buku/update/{id_buku}', [BukuController::class, 'update']);
    Route::get('/buku/delete/{id_buku}', [BukuController::class, 'delete']);
});

//HAK AKSES UNTUK USER
Route::group(['middleware' => 'user'], function () {

    //user
    Route::get('/user', [UserController::class, 'index'])->name('user');

});
