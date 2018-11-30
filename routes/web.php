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


//para eliminar un curso completo
Route::get('/curso/modal','CursoController@destroyCurso');


//para eliminar una materia a un alumno
Route::get('/seccion_curso/modal_materias','AsignacionController@destroyMateria');


//para eliminar todas las materias de un alumno
Route::get('/seccion_curso/modal','AsignacionController@destroy');



//para eliminar una materia del curso
//Route::get('/curso/modal','CursoController@destroyMateria');

//ruta para ver las materias impartidas en un curso especifico
Route::get('/curso/ver_materias', 'CursoController@ver_materias');


//Ruta para editar materias
Route::get('/curso/editMateria','CursoController@editMateria');
Route::get('/curso/updateMateria','CursoController@updateMateria');

//para cargar la lista del curso en cada materia impartida por un profesor
Route::get('listaAlumno', 'AlumnoController@listaAlumnos');

//Para actualizar el promedio final del alumno y guardarlo en la BD
Route::get('/notas/updatePromedio','NotasController@updatePromedio');

//Para actualizar el promedio final de cada asigantura
Route::get('/notas/updatePromedioMateria','NotasController@updatePromedioMateria');

//ver los alumnos aprobados y reprobados de un curso

Route::get('/notas/grado','NotasController@verPorCurso');
Route::get('/notas/verEstadoAlumnos','NotasController@verEstadoAlumnos');

Route::get('/notas/verEstadoPorMateria','NotasController@verEstadoPorMateria');

//ingresar notas y promedios al sistema
Route::post('/notas/ingresarNotas','NotasController@ingresarNotas');


//ver las libreta de notas
Route::get('/libreta_notas/grado','NotasController@grado');
Route::get('/libreta_notas/ver_libreta','NotasController@ver_libreta');

//Ver libreta por materia
Route::get('/libreta_notas/ver_libretaPorMateria','NotasController@ver_libretaPorMateria');

//Cargar todas las noticias para poder eliminarlas o editarlas
Route::get('/noticias/lista_noticias','NoticiasController@lista_noticias');

//Para eliminar una noticia
Route::get('/noticias/modal','NoticiasController@destroyNoticia');

//Actualizar Noticias
Route::post('/noticias/updateNoticia','NoticiasController@updateNoticia');

//Reiniciar Curso
Route::get('/seccion_curso/reiniciarCurso','AsignacionController@reiniciarCurso');


//Para eliminar un aviso
Route::get('/avisos/modal','AvisosController@destroyAviso');

//Para eliminar una citacion
Route::get('/citaciones/modal','CitacionesController@destroyCitacion');



//Para eliminar una citacion
Route::get('/mensajes/modal','MensajesController@destroyMsj');
//VISTA ALUMNO 


//Para ver las notas 
Route::get('/libreta_notas/ver_libretaAlumno','NotasController@verNotas');


//Para ver los avisos 
Route::get('/avisos/ver_aviso_alum','AvisosController@ver_aviso_alum');


//Para ver las citaciones 
Route::get('/citaciones/ver_citacion_alum','CitacionesController@ver_citacion_alum');
//Actualizar citaciones
Route::post('/citaciones/updateCitacion','CitacionesController@updateCitacion');



//citaicones del profesor
Route::get('/citaciones/create2','CitacionesController@create2');
//Rutas:



Route::resource('menu','UsuarioController');
Route::resource('/','HomeController');
Route::resource('seccion_curso', 'AsignacionController');
Route::resource('alumno', 'AlumnoController');
Route::resource('noticias', 'NoticiasController');
Route::resource('profesores', 'ProfesorController');

Route::resource('director', 'DirectorController');
Route::resource('utp', 'UtpController');

Route::resource('curso', 'CursoController');

//Ruta para revisar las notas
Route::resource('notas', 'NotasController');

//guardamos los mensajes enviados
Route::resource('mensajes', 'MensajesController');



Route::resource('/auth','AuthController');
Route::resource('/usuarios','UserController');

Route::resource('proyecto','ProyectoController');
Route::resource('grafico','GraficoController');

//ruta para mandar los avisos a los cursos
Route::resource('avisos','AvisosController');

//ruta para mandar los citaciones a alumnos especificos
Route::resource('citaciones','CitacionesController');

Auth::routes();
//para poder cerrar seccion

Route::get('/logout','Auth\LoginController@logout');

