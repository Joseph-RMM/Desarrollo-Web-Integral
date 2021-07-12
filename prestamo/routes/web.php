<?php

use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');
Auth::routes();
Route::view('producto', 'livewire.productos.index')->middleware('can:seller.home');
Route::view('pdisponibles', 'livewire.productos.productosdisponible')->middleware('can:seller.home');
Route::view('solicitudes', 'livewire.solicitudes.index')->middleware('can:seller.home');
Route::view('productossolicitados', 'livewire.productossolicitados.index')->middleware('can:seller.home');



Auth::routes();

//Rutas del Admin
Route::view('Municipios', 'livewire.Municipios.index')->middleware('can:admin.home');
Route::view('usuarios', 'livewire.users.index')->middleware('can:admin.home');
Route::view('update', 'livewire.users.update')->middleware('can:admin.home');
Route::view('create', 'livewire.users.create')->middleware('can:admin.home');
Route::view('productos', 'livewire.productos.index')->middleware('can:admin.home');
Route::view('Categorias', 'livewire.tiposdeproductos.index')->middleware('can:admin.home');
Route::get('graficdonut', [DashBoardController::class,'graficdonut'])->middleware('can:admin.home');
Auth::routes();
Route::get('Dashboard', [DashBoardController::class, 'index'])->middleware('can:admin.home');
Route::get('updateusers/{id}', [App\Http\Livewire\Users::class, 'edit'])->middleware('can:admin.home');
