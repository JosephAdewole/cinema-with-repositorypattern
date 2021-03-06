<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;



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

Route::get('/movies', function () {
    return view('movies/index');
})->name('movies/create');

Route::get('/cinemas', function () {
    return view('cinemas/create');
})->name('cinemas/create');

Route::get('/schedules/create', function () {
    return view('schedules/create');
})->name('schedules/create');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
