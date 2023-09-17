<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;


Route::get('/', function () {
    return view('home');
});

Route::get('/productos', [ProductoController::class,'index'])->name('productos.index');
Route::get('/ventas', [VentaController::class,'index'])->name('ventas.index');
Route::get('/productos/{id}/edit',[ProductoController::class,'edit'] )->name('productos.edit');
Route::delete('/productos/{id}', [ProductoController::class,'destroy'])->name('productos.destroy');
Route::put('/productos/{id}', [ProductoController::class,'update'])->name('productos.update');
Route::post('/productos/comprar/{id}', [ProductoController::class, 'comprar'])->name('productos.comprar');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');

