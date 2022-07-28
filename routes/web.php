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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/blog/{id}', [App\Http\Controllers\BlogController::class, 'view'])->name('blog');
Route::get('/edit/{id}', [App\Http\Controllers\BlogController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [App\Http\Controllers\BlogController::class, 'update'])->name('update');
Route::get('/delete/{id}', [App\Http\Controllers\BlogController::class, 'delete'])->name('delete');


