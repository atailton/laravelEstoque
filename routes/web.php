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

Route::get('/', function () { return view('welcome'); });
Route::get('/index', function () { return view('index'); });
Route::get('/produtos', 'ProdutoController@listagem');
//Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra'); //Se quiser filtrar tipo de dado usa abaixo
Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+')->middleware('produtos'); //filtrando dados por regex
Route::get('/produtos/novo', 'ProdutoController@novo');
Route::get('/produtos/listaJson', 'ProdutoController@listaJson');
Route::post('/produtos/adiciona', 'ProdutoController@adiciona');
Route::get('/produtos/remove/{id}', 'ProdutoController@remove');
Route::get('/produtos/editar/{id}', 'ProdutoController@editar');
Route::post('/produtos/atualiza/{id}', 'ProdutoController@atualiza')->middleware('produtos'); //pode usar assim



/*Route::match(array('GET', 'POST'), 
  '/produtos/adiciona', 
  'ProdutoController@adiciona');*/

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
