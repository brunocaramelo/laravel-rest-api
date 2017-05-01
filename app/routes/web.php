<?php

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


Route::group(array('prefix' => 'api/v1'), function()
{   
    
    Route::get('vendedores', 'VendedorController@list');
    Route::post('vendedor/create', 'VendedorController@create');
   
    Route::get('vendas-por-vendedor/{id}', 'VendaController@listarPorVendedor');
    Route::post('venda/create', 'VendaController@create');

});