<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BackendController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\FrontendProductoController;
use App\Http\Controllers\FrontendContactoController;
use App\Http\Controllers\FrontendDeseoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DeseosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogoutController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
Auth::routes([]);
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// USUARIOS
Route::resource('backend/usuario', UserController::class, ['names' => 'backend.user'])->parameters(['usuario' => 'user']);
Route::get('logout', [LogoutController::class, 'logout'])->name('logout');

// BACKEND
Route::get('backend', [BackendController::class, 'main'])->name('backend.main')->middleware('auth');
Route::resource('backend/producto', ProductoController::class, ['names' => 'backend.producto'])->middleware('auth');
Route::resource('backend/categoria', CategoriaController::class, ['names' => 'backend.categoria'])->middleware('auth');
Route::resource('backend/deseo', DeseosController::class, ['names' => 'backend.deseo'])->middleware('auth');

// FRONTEND
Route::resource('producto', FrontendProductoController::class, ['names' => 'producto'])->except('destroy')->middleware('auth');
Route::get('producto/{producto}/delete', [FrontendProductoController::class, 'destroy'])->name('producto.delete')->middleware('auth');

// Route::resource('deseo', FrontendDeseoController::class, ['except' => 'store', 'destroy'])->middleware('auth');

Route::resource('deseo', FrontendDeseoController::class)->except([
    'store', 'destroy'
])->middleware('auth');

Route::post('deseo/{idusuario}/{idproducto}', [FrontendDeseoController::class, 'store'])->name('deseo.store')->middleware('auth');
Route::get('deseo/{id}/delete', [FrontendDeseoController::class, 'destroy'])->name('deseo.destroy')->middleware('auth');

Route::resource('contacto', FrontendContactoController::class)->except([
    'index', 'create', 'destroy'
])->middleware('auth');

// Route::resource('contacto', FrontendContactoController::class, ['names' => 'contacto'])->except('store')->middleware('auth');
Route::get('contacto/{idproducto}/index', [FrontendContactoController::class, 'index'])->name('contacto.index')->middleware('auth');
Route::get('contacto/{idproducto}/create', [FrontendContactoController::class, 'create'])->name('contacto.create')->middleware('auth');
Route::get('contacto/{id}/delete', [FrontendContactoController::class, 'destroy'])->name('contacto.destroy')->middleware('auth');
// Route::post('contacto/{idproducto}', [FrontendContactoController::class, 'store'])->name('contacto.store')->middleware('auth');