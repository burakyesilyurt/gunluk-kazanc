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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index']);

Route::get('/ilanlar', [App\Http\Controllers\WelcomeController::class, 'ilanlar'])->name('ilanlar');

Route::get('/ilanlar/{id}', [App\Http\Controllers\WelcomeController::class, 'ilan']);

Route::get('/ilan-basvur', function () {
    return redirect('/ilanlar');
});

Route::post('/ilan-basvur', [App\Http\Controllers\WelcomeController::class, 'basvuruAl'])->name('ilan-basvur');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profil', [App\Http\Controllers\ProfileController::class, 'index'])->name('profil');

Route::get('/isveren', [App\Http\Controllers\EmployerController::class, 'index'])->name('isveren');

Route::get('/ilanver', [App\Http\Controllers\EmployerController::class, 'ilanver'])->name('ilanver');

Route::post('/ilanver', [App\Http\Controllers\EmployerController::class, 'ilanOlustur'])->name('ilanyolla');

Route::get('/ilanlarim', [App\Http\Controllers\EmployerController::class, 'ilanlarim'])->name('ilanlarim');

Route::get('/basvuranlar', [App\Http\Controllers\EmployerController::class, 'basvuranlar'])->name('basvuranlar');
