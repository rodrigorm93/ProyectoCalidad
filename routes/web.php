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


//En estas rutas se permite el envio de mensajes flash
Route::group(['middleware' => ['web']], function(){
	Route::get('/alumno/importar','AlumnoController@importar');
});

Route::group(['middleware' => ['web']], function(){
	Route::get('/profesor/importar','ProfesorController@importar');
});


//RUTAS DE POST Y GET

Route::post('/alumno/importar_store','AlumnoController@importar_store');
Route::post('/profesor/importar_store','ProfesorController@importar_store');

//Ruta para seleccionar el curso de asigancion
Route::get('/seccion_curso/asignar', 'AsignacionController@asignar');
Route::get('/seccion_curso/grado', 'AsignacionController@grado');

//ruta para cargar los alumnos que no esten en el curso
Route::get('/seccion_curso/asignar2', 'AsignacionController@asignar2'); 

Route::get('/seccion_curso/asignarP', 'AsignacionController@asignarP'); 
Route::get('/seccion_curso/asignarPStore', 'AsignacionController@asignarPStore'); 

//Route::get('asignar2/{idCurso}', 'AsignacionController@asignar2');

//crear materias
Route::get('/curso/createMateria', 'CursoController@createMateria'); 
Route::post('/curso/materiaStore', 'CursoController@materiaStore'); 

//para eliminar alumnos de un grado especifico
Route::get('/seccion_curso/seccion', 'AsignacionController@EliminarSeccion');


//Route::get('/seccion_curso/eliminar', 'AsignacionController@destroy');

//ruta para ver las materias impartidas en un curso especifico
Route::get('/curso/ver_materias', 'CursoController@ver_materias');



//Rutas Nuevas
Route::resource('menu','UsuarioController');
Route::resource('/','HomeController');
Route::resource('seccion_curso', 'AsignacionController');
Route::resource('alumno', 'AlumnoController');
Route::resource('noticias', 'NoticiasController');

Route::resource('alumno', 'AlumnoController');
Route::resource('curso', 'CursoController');
//para cargar la lista del curso en cada materia impartida por un profesor
Route::resource('listaAlumno', 'AlumnoController');




Route::resource('/auth','AuthController');
Route::resource('/usuarios','UserController');


Auth::routes();
//para poder cerrar seccion

Route::get('/logout','Auth\LoginController@logout');

