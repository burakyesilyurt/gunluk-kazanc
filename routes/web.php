<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profil', [App\Http\Controllers\ProfileController::class, 'index'])->name('profil');

Route::get('/isveren', [App\Http\Controllers\EmployerController::class, 'index'])->name('isveren');

Route::get('/ilanver', [App\Http\Controllers\EmployerController::class, 'ilanver'])->name('ilanver');
