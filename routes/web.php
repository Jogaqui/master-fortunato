<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComidaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ComandaController;
use App\Http\Controllers\DetalleController;
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
    return view('auth.login');
});

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('mesa', MesaController::class);
Route::resource('categoria', CategoriaController::class);
Route::resource('comida', ComidaController::class);
Route::resource('cliente', ClienteController::class);
Route::resource('comanda', ComandaController::class);
Route::resource('detalle', DetalleController::class);

Route::get('inicio', [HomeController::class, 'index'])->name('inicio');
Route::get('mesaMozo', [MesaController::class, 'indexMozo'])->name('mesaMozo');
Route::get('reporte', [ComandaController::class, 'reporte'])->name('reporte');


Route::get('cancelar-categoria', function () {
    return redirect()->route('categoria.index')->with('datos', '¡Acción cancelada!');
})->name('categoria.cancelar');
Route::get('cancelar-mesa', function () {
    return redirect()->route('mesa.index')->with('datos', '¡Acción cancelada!');
})->name('mesa.cancelar');
Route::get('cancelar-comida', function () {
    return redirect()->route('comida.index')->with('datos', '¡Acción cancelada!');
})->name('comida.cancelar');
Route::get('cancelar-cliente', function () {
    return redirect()->route('cliente.index')->with('datos', '¡Acción cancelada!');
})->name('cliente.cancelar');
Route::get('cancelar-comada', function () {
    return redirect()->route('comanda.index')->with('datos', '¡Acción cancelada!');
})->name('comanda.cancelar');
Route::get('cancelar-detalle', function () {
    return redirect()->route('detalle.index')->with('datos', '¡Acción cancelada!');
})->name('detalle.cancelar');



Route::get('categoria/{id}/confirmar/', [CategoriaController::class, 'confirmar'])->name('categoria.confirmar');
Route::get('mesa/{id}/confirmar/', [MesaController::class, 'confirmar'])->name('mesa.confirmar');
Route::get('comida/{id}/confirmar/', [ComidaController::class, 'confirmar'])->name('comida.confirmar');
Route::get('cliente/{id}/confirmar/', [ClienteController::class, 'confirmar'])->name('cliente.confirmar');
Route::get('comanda/{id}/confirmar/', [ComandaController::class, 'confirmar'])->name('comanda.confirmar');
Route::get('detalle/{id}/confirmar/', [DetalleController::class, 'confirmar'])->name('detalle.confirmar');