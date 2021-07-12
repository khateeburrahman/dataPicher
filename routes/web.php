<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/table/create', [App\Http\Controllers\TableController::class, 'create'])->name('create.table');
Route::get('/table/store', [App\Http\Controllers\TableController::class, 'store'])->name('store.table');
Route::get('/table/show/{table}', [App\Http\Controllers\TableController::class, 'show'])->name('show.table');
Route::post('/import{table}', [App\Http\Controllers\TableController::class, 'import'])->name('import');
