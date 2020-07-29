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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/venda')->name('venda.')->group(function(){
    Route::get('/nova', 'VendaController@novaVenda')->name('venda');
});

Route::prefix('/produto')->name('produto.')->group(function(){
    Route::get('/pesquisa/{inputPesquisa}', 'ProdutoController@pesquisarProduto')->name('pesquisa');
});
