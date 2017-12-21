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
    /*$users= \App\User::inRandomOrder()
        ->where('idfacultad',1)
        ->get();
    return $users;*/
    return view('welcome');
});

//Route::get()



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/chart3', 'Chart3Controller@index')->name('resultadosPositivosenformageneralmodeloBasico');
Route::get('/chart4', 'Chart4Controller@index')->name('resultadosnegativosenformageneralmodeloBasico');

Route::get('/chart5', 'Chart5Controller@index')->name('resultadosPositivosenformageneralmodeloInicial');
Route::get('/chart6', 'Chart6Controller@index')->name('resultadosnegativosenformageneralmodeloInicial');

Route::get('/chart7', 'Chart7Controller@index')->name('resultadosPositivosenformageneralmodeloRepetible');
Route::get('/chart8', 'Chart8Controller@index')->name('resultadosnegativosenformageneralmodeloRepetible');

Route::get('/chart9', 'Chart9Controller@index')->name('resultadosPositivosenformageneralmodeloDefinido');
Route::get('/chart10', 'Chart10Controller@index')->name('resultadosnegativosenformageneralmodeloDefinido');

Route::get('/chart11', 'Chart11Controller@index')->name('resultadosPositivosenformageneralmodeloMedible');
Route::get('/chart12', 'Chart12Controller@index')->name('resultadosnegativosenformageneralmodeloMedible');

Route::get('/chart13', 'Chart13Controller@index')->name('resultadosPositivosenformageneralmodeloOptimizado');
Route::get('/chart14', 'Chart14Controller@index')->name('resultadosnegativosenformageneralmodeloOptimizado');



Route::resource('/admin/gestionarmodelo','ModeloController');
Route::resource('/admin/gestionarfacultad','FacultadController');
Route::resource('/admin/gestionartipousuario','TipoUsuarioController');
Route::resource('/admin/gestionarusuario','UsuarioController');
Route::resource('/admin/gestionarencuesta','EncuestaController');
Route::resource('/admin/gestionarindicador','IndicadorController');
Route::resource('/admin/gestionarestadistica','ChartController');

Route::resource('/admin/gestionarresultado','ResultadoController');

Route::get('/admin/gestionargrafico/si/{idencuesta}','ResultadoController@showgrafico');
Route::get('/admin/gestionargrafico/no/{idencuesta}','ResultadoController@showgraficoN');


Route::get('/admin/gestionarresultado/{idencuesta}','ResultadoController@show');
Route::get('/admin/gestionarresultado/{idencuesta}/{idusuario}','ResultadoController@detalle');

Route::get('/admin/gestionargrafico/yes/{idencuesta}/{idusuario}','ResultadoController@detallegrafico');
Route::get('/admin/gestionargrafico/no/{idencuesta}/{idusuario}','ResultadoController@detallegraficoN');

Route::resource('/admin/gestionarmiencuesta','MiEncuestaController');

Route::get('pdf',function (){

    $pdf=PDF::loadView('vista');
   return $pdf->download('archivo.pdf');
});