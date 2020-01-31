<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('uf','ags\AgsUfController');
Route::apiResource('cidade','ags\AgsCidadeController');
Route::apiResource('pais','ags\AgsPaisController');
Route::apiResource('cep','ags\AgsCepController');
Route::apiResource('cep','ags\AgsDistritoSanitario');