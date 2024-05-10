<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticiaController;

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

Route::get('/noticias', [NoticiaController::class, 'index']);
Route::post('/noticias', [NoticiaController::class, 'store']);
Route::get('/noticias/{id}', [NoticiaController::class, 'show']);
Route::put('/noticias/{id}', [NoticiaController::class, 'update']);
Route::delete('/noticias/{id}', [NoticiaController::class, 'destroy']);
