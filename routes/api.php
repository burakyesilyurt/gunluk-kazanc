<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/jobs', [App\Http\Controllers\Api\Jobs::class, 'getJobs']);
Route::get('/job/{id}', [App\Http\Controllers\Api\Jobs::class, 'getJob']);
Route::post('/job', [App\Http\Controllers\Api\Jobs::class, 'saveJob']);
Route::delete('/job/{id}', [App\Http\Controllers\Api\Jobs::class, 'removeJob']);
Route::post('/login', [App\Http\Controllers\Api\Jobs::class, 'login']);
Route::post('/register', [App\Http\Controllers\Api\Jobs::class, 'register']);
Route::get('/appliers/{id}', [App\Http\Controllers\Api\Employer::class, 'appliers']);
Route::get('/employerWorks/{firmaId}', [App\Http\Controllers\Api\Employer::class, 'getEmployerJobs']);
Route::post('/createProfile', [App\Http\Controllers\Api\Applicants::class, 'createProfile']);
Route::get('/profile/{userId}', [App\Http\Controllers\Api\Applicants::class, 'profileInfo']);
