<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\CitadosController;
use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\Dentista_pacienteController;
use App\Http\Controllers\DisponibleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Models\Cita;

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

/*Rutas de Inicio */
Route::get('/inicio', function () {
    return view('informacion.inicio');
})->name('inicio');

/*El CRUD de usuarios hecho desde el principio no se utilizó debido a la configuración de jestream */

Route::resource('consultorio', ConsultorioController::class)->middleware('auth');
Route::resource('disponible', DisponibleController::class)->middleware('auth');
Route::resource('contactos', Dentista_pacienteController::class)->middleware('auth');
Route::resource('cita', CitaController::class)->middleware('auth');
Route::resource('make', CitadosController::class)->middleware('auth');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
