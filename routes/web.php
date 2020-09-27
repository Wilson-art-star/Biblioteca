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
    return view('contenido/contenido');
});

Route::get('categoria', function () {
    return view('categoria');
});

Route::get('categorias','CateoriaController@index');

Route::get('editoriales','EditorialController@index');

Route::get('idiomas','IdiomaController@index');

Route::get('paises','PaisController@index');

Route::get('autores','AutorController@index');

/////////////////////////////////////

Route::post('/categorias/registrar','CateoriaController@store');

Route::put('/categorias/actualizar','CateoriaController@update');

Route::post('/categorias/eliminar','CateoriaController@destroy');



Route::post('/editoriales/registrar','EditorialController@store');

Route::post('/editoriales/eliminar','EditorialController@destroy');


Route::post('/idiomas/registrar','IdiomaController@store');

Route::post('/idiomas/eliminar','IdiomaController@destroy');


Route::post('/paises/registrar','PaisController@store');

Route::post('/paises/eliminar','PaisController@destroy');


Route::post('/autores/registrar','AutorController@store');

Route::post('/autores/eliminar','AutorController@destroy');