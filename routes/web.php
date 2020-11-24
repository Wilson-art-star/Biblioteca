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


////////////////////(RUTA PARA INGRESAR AL CONTENDO DESDE EL LOGIN)
Route::get('/main', function () {
    return view('contenido/contenido');
})->name('main');

Route::get('categoria', function () {
    return view('categoria');
});


////////////////////////////////////////////////(LOGIN)

Route::get('/','Auth\LoginController@mostrarLogin');
Route::post('/login','Auth\LoginController@login')->name('login');

/////////////////////////////////////(CATEGORIAS)

Route::get('categorias','CateoriaController@index');

Route::get('getCat','CateoriaController@getCat');

Route::post('/categorias/registrar','CateoriaController@store');

Route::put('/categorias/actualizar','CateoriaController@update');

Route::post('/categorias/eliminar','CateoriaController@destroy');

/////////////////////////////////////(EDITORIALES)

Route::get('editorials','EditorialsController@index');

Route::get('getEdi','EditorialsController@getEdi');

Route::post('/editorials/registrar','EditorialsController@store');

Route::put('/editorials/actualizar','EditorialsController@update');

Route::post('/editorials/eliminar','EditorialsController@destroy');

/////////////////////////////////////(IDIOMAS)

Route::get('idiomas','IdiomaController@index');

Route::get('getIdm','IdiomaController@getIdm');

Route::post('/idiomas/registrar','IdiomaController@store');

Route::put('/idiomas/actualizar','IdiomaController@update');

Route::post('/idiomas/eliminar','IdiomaController@destroy');

/////////////////////////////////////(PAISES)

Route::get('paises','PaisController@index');

Route::get('getPas','PaisController@getPas');

Route::post('/paises/registrar','PaisController@store');

Route::put('/paises/actualizar','PaisController@update');

Route::post('/paises/eliminar','PaisController@destroy');

/////////////////////////////////////(AUTORES)

Route::get('autores','AutorController@index');

Route::get('getAut','AutorController@getAut');

Route::post('/autores/registrar','AutorController@store');

Route::put('/autores/actualizar','AutorController@update');

Route::post('/autores/eliminar','AutorController@destroy');

//////////////////////////////////////////////(PERSONAS)

Route::get('getPer','PersonasController@getPersona');

//////////////////////////////////////////////(SOLICITUDES)

Route::get('solicitud','SolicitudController@index');

Route::post('/solicitud/registrar','SolicitudController@store');

/////////////////////////////////////////////////(LIBROS)

Route::get('libros','LibrosController@index');
Route::get('getlibros','LibrosController@getLibros');

////////////////////////////////////////////////////////

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/////////////////////////////////////(USERS)

Route::get('user','UserController@index');

Route::post('/user/registrar','UserController@store');

Route::put('/user/actualizar','UserController@update');

Route::post('/user/eliminar','UserController@destroy');