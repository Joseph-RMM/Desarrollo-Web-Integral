<?php

use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::resource('Admin',UserController::class)->names('admin.users');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('producto', 'livewire.productos.index')->middleware('auth');
	Route::view('users', 'livewire.users.index')->middleware('auth');
	
	Route::view('image-upload', 'livewire.image-upload')->middleware('auth');
	
Auth::routes();

//Rutas del Admin
Route::view('usuarios', 'livewire.users.index')->middleware('can:admin.home');
Route::view('update', 'livewire.users.update')->middleware('can:admin.home');
Route::view('create', 'livewire.users.create')->middleware('can:admin.home');
Route::view('productos', 'livewire.productos.index')->middleware('can:admin.home');
Route::view('Categorias', 'livewire.tiposdeproductos.index')->middleware('can:admin.home');
Route::get('graficdonut', [DashBoardController::class,'graficdonut'])->middleware('can:admin.home');
Auth::routes();
Route::get('Dashboard', [DashBoardController::class, 'index'])->middleware('can:admin.home');
