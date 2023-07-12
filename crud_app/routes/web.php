<?php

use App\Http\Controllers\categoriaController;
use App\Http\Controllers\ListaTareas;
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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/app', function () {
//     return view('templates.index');
// })->name('app');

Route::get('/tareas', [ListaTareas::class, 'getall'])->name('tareas');

Route::post('/tareas', [ListaTareas::class, 'crearTarea'])->name('tareas');


Route::get('/tareas/{id}', [ListaTareas::class, 'editar'])->name('tarea-edit');

Route::patch('/tareas/{id}', [ListaTareas::class, 'actualizar'])->name('tarea-update');

Route::delete('/tareas/{id}', [ListaTareas::class, 'eliminar'])->name('tarea-delete');

//categorias-------------------------------
Route::get('/categorias', [categoriaController::class, 'index'])->name('categorias');

Route::post('/categorias', [categoriaController::class, 'store'])->name('categorias');


Route::get('/categorias/{id}', [categoriaController::class, 'show'])->name('categoria_editar');

Route::patch('/categorias/{id}', [categoriaController::class, 'update'])->name('categoria_update');

Route::delete('/categorias/{id}', [categoriaController::class, 'destroy'])->name('categoria_delete');

// //categoria
