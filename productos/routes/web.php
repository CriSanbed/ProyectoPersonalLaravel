<?php

use App\Http\Controllers\ProductosController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PerfilController;
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

/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/productos', [ProductosController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductosController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductosController::class, 'store'])->name('productos.store');
Route::get('/productos/{producto}', [ProductosController::class, 'show'])->name('productos.show');
Route::get('/productos/{producto}/edit', [ProductosController::class, 'edit']) -> name('productos.edit');
Route::put('/productos/{producto}', [ProductosController::class, 'update']) -> name('productos.update');
Route::delete('/productos/{producto}', [ProductosController::class, 'destroy'])->name('productos.destroy');
Auth::routes();*/



//LLAMAR RUTAS RESOURCES CONTROLLER
Route::resource('productos', ProductosController::class);
//PERFILES
Route::get('/perfiles/{perfil}', [PerfilController::class, 'show'])->name('perfiles.show');
Route::get('/perfiles/{perfil}/edit', [PerfilController::class, 'edit'])->name('perfiles.edit');
Route::put('/perfiles/{perfil}', [PerfilController::class, 'update'])->name('perfiles.update');

//like-recetas
Route::post('/productos/{producto}', [LikeController::class, 'update'])->name('likes.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



