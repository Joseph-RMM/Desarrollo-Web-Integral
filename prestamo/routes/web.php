<?php

use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Municipio;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProdutosellerController;
use Symfony\Component\Routing\Generator\Urlgeneratorinterface;
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');
//Route::view('producto', 'livewire.productos.index')->middleware('auth');
Route::view('pdisponibles', 'livewire.productos.productosdisponible')->middleware('can:seller.home');
Route::view('solicitudes', 'livewire.solicitudes.index')->middleware('can:seller.home');
Route::view('productossolicitados', 'livewire.productossolicitados.index')->middleware('auth');
Route::view('producto', 'livewire.productos.index')->middleware('can:seller.home');
//Obtiene json de productos original v
Route::get('productosseller',[ProdutosellerController::class,'index'])->middleware('can:seller.home');
Route::view('createp','livewire.productossellers.create')->middleware('can:seller.home');
Route::view('store','livewire.productossellers.store')->middleware('can:seller.home');
Route::middleware(['createp', 'second'])->group(function () {
    return view('livewire.productossellers.create');
});
Auth::routes();

//Rutas del Admin
Route::view('Municipios', 'livewire.Municipios.index')->middleware('can:admin.home');
Route::view('usuarios', 'livewire.users.index')->middleware('can:admin.home');
Route::view('update', 'livewire.users.update')->middleware('can:admin.home');
Route::view('create', 'livewire.users.create')->middleware('can:admin.home');
Route::view('productos', 'livewire.productos.index')->middleware('can:admin.home');
Route::view('Categorias', 'livewire.tiposdeproductos.index')->middleware('can:admin.home');
Route::get('graficdonut', [DashBoardController::class,'graficdonut'])->middleware('can:admin.home');
Route::get('Dashboard', [DashBoardController::class, 'index'])->middleware('can:admin.home');
Route::get('actualizar', [App\Http\Livewire\Users::class, 'edit'])->middleware('can:admin.home');
