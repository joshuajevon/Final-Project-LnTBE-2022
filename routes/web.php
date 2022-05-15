<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => IsAdminMiddleware::class], function(){
    Route::get('/insert', [BarangController::class, 'insert'])->name('insert');
    Route::get('updateBarang/{id}', [BarangController::class, 'updateBarang'])->name('updateBarang');
    Route::get('/view', [BarangController::class, 'view'])->name('view');
});

Route::post('insertBarang', [BarangController::class, 'insertBarang'])->name('insertBarang');

Route::get('/viewuser', [BarangController::class, 'viewuser'])->name('viewuser');



Route::patch('/update/{id}', [BarangController::class, 'update'])->name('update');

Route::delete('/delete/{id}', [BarangController::class, 'delete'])->name('delete');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/faktur/{id}', [BarangController::class , 'faktur'])->name('faktur');

Route::post('/cetakfaktur/{id}', [BarangController::class , 'cetakfaktur'])->name('cetakfaktur');
