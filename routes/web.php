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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();


Route::prefix('usuarios')->name('usuarios.')->group(function () {
    Route::get('/', 'UsuariosController@index')->name('index');
    Route::match(['get', 'post'], '/cadastrar', 'UsuariosController@cadastrar')->name('cadastrar');
    Route::get('/{id}/visualizar', 'UsuariosController@visualizar')->name('visualizar');
    Route::match(['get', 'post'], '/{id}/editar', 'UsuariosController@editar')->name('editar');
});
Route::prefix('contas')->name('contas.')->group(function () {
    Route::get('/', 'ContasController@index')->name('index');
    Route::post('/salvar', 'ContasController@salvar')->name('salvar');
    Route::post('/load_tipo_contas', 'ContasController@load_tipo_contas')->name('loadTipoContas');
    Route::post('/load_bancos', 'ContasController@load_bancos')->name('loadBancos');
    Route::post('/load_contas', 'ContasController@load_contas')->name('loadContas');
    Route::post('/load_conta', 'ContasController@load_conta')->name('loadConta');
});
