<?php

use App\Http\Controllers\ProductosController;
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

/* Auth::routes(); */

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/productos', [ProductosController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductosController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductosController::class, 'store'])->name('productos.store');
Route::get('/productos/{producto}', [ProductosController::class, 'show'])->name('productos.show');
Route::get('/productos/{producto}/edit', [ProductosController::class, 'edit']) -> name('productos.edit');
Route::put('/productos/{producto}', [ProductosController::class, 'update']) -> name('productos.update');
Auth::routes();
