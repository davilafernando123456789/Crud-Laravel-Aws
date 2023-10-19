<?php

// En automático, se agrega el controlador creado
use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Al comienzo es a nivel cliente, name es a nivel programación

Route::get('/', [PersonaController::class, 'index'])->name('personas.index');
Route::get('/create', [PersonaController::class, 'create'])->name('personas.create');
Route::get('/edit', [PersonaController::class, 'edit'])->name('personas.edit');
