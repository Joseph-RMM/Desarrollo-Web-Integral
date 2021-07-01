<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::resource('Admin',UserController::class)->names('admin.users');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();




Auth::routes();

//Rutas del Admin
Route::view('usuarios', 'livewire.users.index')->middleware('auth');
Route::view('productos', 'livewire.productos.index')->middleware('auth');
Route::view('inicio', 'Admin.index')->middleware('auth');
