<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/noticias', function () {
    return response()->json(['message' => 'Lista de notícias']);
});

Route::post('/noticias', function () {

});

Route::get('/noticias/{id}', function ($id) {

});

Route::put('/noticias/{id}', function ($id) {

});

Route::delete('/noticias/{id}', function ($id) {

});
