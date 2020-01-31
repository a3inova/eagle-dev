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
Route::apiResource('distritosanitario','Ags\AgsDistritoSanitarioController');
Route::apiResource('bairro','Ags\AgsBairroController');
Route::apiResource('endereco','Ags\AgsEnderecoController');
Route::apiResource('contato','Ags\AgsContatoController');
Route::apiResource('pessoa','Ags\AgsPessoaController');
Route::apiResource('regiao','Ags\AgsRegiaoController');
Route::apiResource('modulo','Ags\AgsModuloController');
Route::apiResource('tipoLogradouro','Ags\AgsTipoLogradouroController');
Route::apiResource('tabelaItem','Ags\AgsTabelaItemController');