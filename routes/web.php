<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\Admin\ExamenController;
use App\Http\Controllers\Admin\ActividadController;
use App\Http\Controllers\Admin\PreguntaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['role:SuperAdministrador']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('roles', RolController::class);
    Route::resource('cursos', CursoController::class);
    Route::resource('actividades', ActividadController::class);
    Route::resource('examenes', ExamenController::class);
    Route::get('preguntas/{id}', [PreguntaController::class, 'create'])->name('preguntas.create');
    Route::resource('preguntas', PreguntaController::class)->except('create');
});

//rutas para las tablas


Route::get('api/users', [UserController::class, 'datatables']);
Route::get('api/cursos', [CursoController::class, 'datatables']);
Route::get('api/examenes', [ExamenController::class, 'datatables']);
Route::get('api/actividades', [ActividadController::class, 'datatables']);
Route::get('api/preguntas/{examene}', [PreguntaController::class, 'datatables']);

//rutas web sin autenticacion
Route::get('/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('menu');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/examen/{examene}', [App\Http\Controllers\Web\UserController::class, 'show'])->name('examen_show');
Route::get('/examen', [App\Http\Controllers\Web\UserController::class, 'index'])->name('examen_index');
Route::post('/examen', [App\Http\Controllers\Web\UserController::class, 'store_examen'])->name('examen_create');
Route::resource('users', UserController::class);
