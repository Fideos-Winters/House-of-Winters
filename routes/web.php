<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\empleadosController;
use App\Http\Controllers\productoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\GoogleController;




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

//Route::get('/', function () {return view('welcome');});

Route::view('/principal','/principal/principal');
Route::view('/galeria','/galeria/galeria');
Route::view('/meta','/meta/meta');
Route::view('/perfil','/perfil/perfil');
Route::view('/hobbies','/hobbies/hobbies');
Route::view('/prueba','/pruebaframework');
//layouts
Route::view('/NavbarUsuario','/layouts/app');


//admins
//route::view('/equipo', '/equipo/listado');
//route::view('/Inicio', 'Inicio/inicio');

//principal
route::view('/contacto', 'contacto/contacto');
Route::view('/Novedades','/novedades/novedades');
//Route::view('/Productos','/Productos/Productos');
//Route::view('/Aproducto','/Productos/formulario');
//route::view('/contacto', 'contacto/comentarios');
//route::view('/acontacto', 'contacto/contacto');
//route::view('/aEquipo', 'equipo/aEquipo');

// Login manual con empleados
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Login con Google
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);



Route::middleware(['auth:admin'])->group(function () {


Route::get('/equipo/listado', [empleadosController:: class, 'index']);

Route::resource('empleados', empleadosController::class);

Route::get('/Productos/Productos', [productoController:: class, 'index']);

Route::get('/Contacto/Comentarios', [ComentarioController:: class, 'index']);


Route::get('/Equipo/aEquipo', [empleadosController:: class, 'create']);
Route::post('/Equipo/store', [empleadosController:: class, 'store']);


Route::get('/Conctacto/contacto', [ComentarioController:: class, 'create']);
Route::post('/Contacto/store', [ComentarioController:: class, 'store']);

Route::get('/Productos/formulario', [productoController:: class, 'create']);
Route::post('/Producto/store', [productoController:: class, 'store']);

//editar de empleados
Route::get('/Equipo/{ID}/editar', [empleadosController::class, 'edit']);
Route::post('/Equipo/{ID}/actualizar', [EmpleadosController::class, 'update']);
Route::delete('/Equipo/{ID}/eliminar', [EmpleadosController::class, 'destroy']);


//editar comentarios no se pq pero si
Route::get('/Contacto/{ID}/contacto-editar', [ComentarioController::class, 'edit']);
Route::post('/Contacto/{ID}/actualizar', [ComentarioController::class, 'update']);
Route::delete('/Contacto/{ID}/eliminar', [ComentarioController::class, 'destroy']);



//producto editar 
Route::get('/Prodcutos/{ID}/formulario-editar', [productoController::class, 'edit']);
Route::post('/Productos/{ID}/actualizar', [productoController::class, 'update']);
Route::delete('/Producto/{ID}', [ProductoController::class, 'destroy']);

//controlador inicio 


    Route::get('/Inicio', [InicioController::class, 'index']);




});