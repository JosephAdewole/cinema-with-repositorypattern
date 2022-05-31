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
});

Route::get('movies/{id}', [MovieController::class, 'showpage']);

// Route::get('/movies{id}', function () {
//     return view('movies/single', ['id' => $id]);
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/movies/create', function () {
    return view('movies/create');
})->middleware(['auth'])->name('movies/create');


require __DIR__.'/auth.php';
