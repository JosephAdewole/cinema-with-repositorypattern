<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\ScheduleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('movies', [MovieController::class, 'index']);
Route::get('movies/{id}', [MovieController::class, 'show']);
Route::post('movies', [MovieController::class, 'store']);
Route::put('movies/{id}', [MovieController::class, 'update']);
Route::delete('movies/{id}', [MovieController::class, 'delete']);

Route::get('cinemas', [CinemaController::class, 'index']);
Route::get('cinemas/{id}', [CinemaController::class, 'show']);
Route::post('cinemas', [CinemaController::class, 'store']);
Route::put('cinemas/{id}', [CinemaController::class, 'update']);
Route::delete('cinemas/{id}', [CinemaController::class, 'delete']);



Route::post('schedules', [ScheduleController::class, 'store']);
