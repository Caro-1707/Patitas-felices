<?php

use Illuminate\Support\Facades\Route;
use App\Models\SolicitudAdopcion;

use App\Http\Controllers\usuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SolicitudController;



Route::get('/inicio', function (){
    return view('inicio');
}) ->name('inicio');

Route::get('/crearCuenta', function (){
    return view('crearCuenta');
}) ->name('crearCuenta');

Route::get('/login', function (){
    return view('login');
}) ->name('login');


Route::get('/registro', [usuarioController::class, 'showRegister'])
    ->name('registro');

Route::post('/registro', [usuarioController::class, 'register'])
    ->name('register');

Route::get('/home', function () {
    return view('usuario.home');
})->name('home');

Route::post('/login', [usuarioController::class, 'login'])
    ->name('login.post');

Route::post('/logout', [usuarioController::class, 'logout'])
    ->name('logout');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/crear-mascota', [MascotaController::class, 'create'])
    ->name('admin.crear.mascota');

Route::get('/admin/mascota/{mascota}/editar', [MascotaController::class, 'edit'])
    ->name('mascota.edit');

Route::put('/admin/mascota/{mascota}', [MascotaController::class, 'update'])
    ->name('mascota.update');

Route::get('/admin/mascotas', [MascotaController::class, 'index'])
    ->name('mascota.index');

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

Route::delete('/admin/mascota/{mascota}', [MascotaController::class, 'destroy'])
    ->name('mascota.destroy');

Route::get('/admin/categorias', function () {
    return view('admin.admin-crear-categoria');
})->name('admin.categorias');


Route::get('/categoria/{id}', [HomeController::class, 'filtrarCategoria'])
    ->name('categoria.filtrar');

Route::get('/admin/crear-mascota', [MascotaController::class, 'create'])
    ->name('admin.crear.mascota');

Route::get('/admin/mascotas', [MascotaController::class, 'index'])
    ->name('mascota.index');

Route::post('/admin/mascota', [MascotaController::class, 'store'])
    ->name('mascota.store');

Route::get('/admin/crear-categoria', [CategoriaController::class, 'index'])
    ->name('admin.crear.categoria');

Route::get('/admin/categoria', [CategoriaController::class, 'index'])
    ->name('categoria.index');

Route::get('/admin/categoria/crear', [CategoriaController::class, 'create'])
    ->name('categoria.create');

Route::post('/admin/categoria', [CategoriaController::class, 'store'])
    ->name('categoria.store');

Route::get('/admin/categoria/{categoria}/editar', [CategoriaController::class, 'edit'])
    ->name('categoria.edit');

Route::put('/admin/categoria/{categoria}', [CategoriaController::class, 'update'])
    ->name('categoria.update');

Route::delete('/admin/categoria/{categoria}', [CategoriaController::class, 'destroy'])
    ->name('categoria.destroy');

Route::post('/admin/categoria', [CategoriaController::class, 'store'])
    ->name('categoria.store');

Route::get('/adoptar/{id}', [SolicitudController::class, 'create'])
    ->name('adopcion.create');

Route::post('/solicitudes', [SolicitudController::class, 'store'])
    ->name('solicitud.store');

Route::get('/admin/solicitudes', [SolicitudController::class, 'index'])
    ->name('admin.solicitudes');

    Route::get('/admin/solicitudes', [SolicitudController::class, 'index'])
    ->name('solicitudes.index');

Route::put('/admin/solicitudes/{id}/aprobar', [SolicitudController::class, 'aprobar'])
    ->name('solicitudes.aprobar');

Route::put('/admin/solicitudes/{id}/rechazar', [SolicitudController::class, 'rechazar'])
    ->name('solicitudes.rechazar');


Route::get('/admin/reporte/mascotas', [MascotaController::class, 'reportePDF'])
    ->name('mascotas.pdf');

Route::get('admin/reportes/excel', [MascotaController::class,'exportarEstadisticas'])
    ->name('estadisticas.excel');