<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
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

Route::get('/', function () {
    return view('layouts.master');
});

Route::get('/pet', [App\Http\Controllers\PetController::class, 'index']);
Route::post('/pet/search', [App\Http\Controllers\PetController::class, 'search']);
Route::get('/pet/edit/{id?}' , [App\Http\Controllers\PetController::class, 'edit']);
Route::post('/pet/update' , [App\Http\Controllers\PetController::class, 'update']);
Route::post('/pet/insert' , [App\Http\Controllers\PetController::class, 'insert']);
Route::get('/pet/remove/{id?}' , [App\Http\Controllers\PetController::class, 'remove']);