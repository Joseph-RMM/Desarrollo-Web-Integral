<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/usuario', [App\Http\Controllers\HomeController::class, 'usuario'])->name('usuario');

/*
Route::get('/usuario', function () {
    return view('usuario');
});
*/


//Auth::routes();

//Route::get('users/update', [App\Http\Controllers\HomeController::class, 'index'])->name('update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('producto', 'livewire.productos.index')->middleware('auth');
	Route::view('users', 'livewire.users.index')->middleware('auth');
	Route::view('update', 'livewire.users.update')->middleware('auth');
	Route::view('create', 'livewire.users.create')->middleware('auth');
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
