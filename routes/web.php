<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Middleware\CheckRole;

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


Route::view('/', 'home')->name('home');
// rutas login



Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'valida'])->name('login'); 

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');


// rutas register
Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [LoginController::class, 'valida'])->name('register'); 



Route::view('/cliente', 'cliente.home-user')->name('cliente.dashboard');


// Rutas para las vistas de los distintos roles
Route::get('/categorias/cliente', [CategoriaController::class, 'index2'])->name('categorias.index2');
Route::get('/productos/{categoria}', [ProductoController::class, 'productosPorCategoria'])->name('productosPorCategoria');

Route::view('/contador', 'inicio-contador')->name('contador');
Route::view('/encargado', 'inicio-encargado')->name('encargado');
Route::view('/supervisor', 'inicio-supervisor')->name('supervisor');
Route::view('/vendedor', 'inicio-vendedor')->name('vendedor');

// CRUD CATEGORIAS
Route::get('/categorias', [CategoriaController::class, 'index2'])->name('categorias.index');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::get('/categorias/agregar', [CategoriaController::class, 'create'])->name('categorias.create');

Route::post('/categorias', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
Route::get('/categorias/delete', [CategoriaController::class, 'delete'])->name('categorias.delete');


Route::get('/categoriasuser', [CategoriaController::class, 'indexuser'])->name('categorias.indexuser');
Route::get('/productos/user/{categoria}', [ProductoController::class, 'productosPorCategoriaUser'])->name('productosPorCategoriaUser');
