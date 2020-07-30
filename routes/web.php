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

Route::prefix('/vendas')->name('vendas.')->group(function(){
    Route::get('/inicio', 'SaleController@inicio')->name('inicio');
    Route::post('/nova', 'SaleController@novaVendaForm')->name('nova');
    Route::post('/nova/cadastro', 'SaleController@cadastroVenda')->name('cadastro');
});

Route::prefix('/produto')->name('produto.')->group(function(){
    Route::get('/pesquisa/{inputPesquisa}', 'ProductController@pesquisarProduto')->name('pesquisa');
});

Route::prefix('/fornecedor')->name('fornecedor.')->group(function(){
    Route::get('/todos', 'ProviderController@fornecedoresTodos')->name('todos');
});

