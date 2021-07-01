<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::resource('Admin',UserController::class)->names('admin.users');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


<<<<<<< HEAD
=======
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('tipo_productos', 'livewire.tipo_productos.index')->middleware('auth');
	Route::view('producto', 'livewire.productos.index')->middleware('auth');
	Route::view('users', 'livewire.users.index')->middleware('auth');
Auth::routes();
>>>>>>> ef477fb89c46d4a5570781b74d615096e0d75308


Auth::routes();

//Rutas del Admin
Route::view('usuarios', 'livewire.users.index')->middleware('auth');
Route::view('productos', 'livewire.productos.index')->middleware('auth');
Route::view('inicio', 'Admin.index')->middleware('auth');
