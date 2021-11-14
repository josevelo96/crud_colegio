<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
Route::redirect('/', 'profesores');

Route::resource('profesores', Controllers\ProfesorController::class)->parameters([
    'profesores' => 'profesor'
]);
Route::get('/alumnos/{alumno}/agregar_clase', [Controllers\AlumnoController::class, 'agregar_clase'])->name('alumnos.agregar_clase');
Route::get('/alumnos/{alumno}/clases', [Controllers\AlumnoController::class, 'clases'])->name('alumnos.clases');
Route::resource('alumnos', Controllers\AlumnoController::class);
Route::resource('grados', Controllers\GradoController::class);
Route::resource('clases', Controllers\AlumnoGradoController::class)->parameters([
    'clases' => 'alumno_grado'
]);
