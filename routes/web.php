<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\ExampleController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\Media_resourceController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['check.role:SuperAdministrador|Profesor']], function () {

    //rutas generales
    Route::resource('roles', RolController::class);
    Route::resource('users', UserController::class);
    Route::resource('tests', TestController::class);
    Route::resource('notes', NoteController::class);
    Route::resource('themes', ThemeController::class);
    Route::resource('contents', ContentController::class);
    Route::resource('activitys', ActivityController::class);
    Route::resource('media_resources', Media_resourceController::class);
    Route::resource('samples', ExampleController::class)->except(['create']);
    Route::resource('questions', QuestionController::class)->except('create');
    Route::get('/test_show/{testUserId}', [NoteController::class, 'show'])->name('test_show2');

    //rutas especificas
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/content/create', [ContentController::class, 'create'])->name('content.create-form');
    Route::get('/example/create', [ExampleController::class, 'create'])->name('example.create-form');
    Route::get('/question/create', [QuestionController::class, 'create'])->name('question.create-form');

    //demas cosas
    Route::get('/generar-pdf/{exam_id?}/{user_id?}', 'App\Http\Controllers\Admin\NoteController@generarPDF')->name('generar-pdf');
    Route::get('/generar-pdf2/{status?}', 'App\Http\Controllers\Admin\NoteController@generarPDF2')->name('generar-pdf2');
    Route::get('/backup', 'App\Http\Controllers\HomeController@create')->name('backup');
    Route::get('/backup-status', 'App\Http\Controllers\HomeController@checkBackupStatus');
});

//rutas para las tablas
Route::get('api/temas-menu', [HomeController::class, 'datatables']);
Route::get('api/roles', [RolController::class, 'datatables']);
Route::get('api/tests', [TestController::class, 'datatables']);
Route::get('api/notes', [NoteController::class, 'datatables']);
Route::get('api/users', [UserController::class, 'datatables']);
Route::get('api/themes', [ThemeController::class, 'datatables']);
Route::get('api/activitys', [ActivityController::class, 'datatables']);
Route::get('api/contents/{theme}', [ContentController::class, 'datatables']);
Route::get('api/questions/{test}', [QuestionController::class, 'datatables']);
Route::get('api/examples/{content}', [ExampleController::class, 'datatables']);
Route::get('api/resources', [Media_resourceController::class, 'datatables']);
Route::get('/api/notes', [NoteController::class, 'datatables']);

//rutas web sin autenticacion

//rutas de herramientas
Route::get('/tools', [App\Http\Controllers\Admin\HerramientaController::class, 'index'])->name('tools');
// funciona
Route::get('/tool1', [App\Http\Controllers\Admin\HerramientaController::class, 'show'])->name('tool1');
Route::post('/rate1', [App\Http\Controllers\Admin\HerramientaController::class, 'store'])->name('rate1');
// funciona
Route::get('/tool2', [App\Http\Controllers\Admin\HerramientaController::class, 'show1'])->name('tool2');
Route::post('/rate2', [App\Http\Controllers\Admin\HerramientaController::class, 'store1'])->name('rate2');
//funciona
Route::get('/tool3', [App\Http\Controllers\Admin\HerramientaController::class, 'show2'])->name('tool3');
Route::post('/rate3', [App\Http\Controllers\Admin\HerramientaController::class, 'store2'])->name('rate3');
//funciona
Route::get('/tool4', [App\Http\Controllers\Admin\HerramientaController::class, 'show3'])->name('tool4');
Route::post('/rate4', [App\Http\Controllers\Admin\HerramientaController::class, 'store3'])->name('rate4');
//
Route::get('/tool5', [App\Http\Controllers\Admin\HerramientaController::class, 'show4'])->name('tool5');
Route::post('/rate5', [App\Http\Controllers\Admin\HerramientaController::class, 'store4'])->name('rate5');
//rutas vista usuario

//presentacion y menu
Route::get('/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('menu');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

//rutas de usuarios
//usuario
Route::get('/user/{user}', [App\Http\Controllers\Web\UserController::class, 'show_usuario'])->name('usuario_show');
//rutas de modelos
Route::get('/models', [App\Http\Controllers\Web\UserController::class, 'index_model'])->name('models');
Route::get('/models1', [App\Http\Controllers\Web\UserController::class, 'show'])->name('models1');
Route::get('/models2', [App\Http\Controllers\Web\UserController::class, 'show1'])->name('models2');
Route::get('/models3', [App\Http\Controllers\Web\UserController::class, 'show2'])->name('models2');
//examen
Route::get('/test', [App\Http\Controllers\Web\UserController::class, 'index_test'])->name('test_index');
Route::get('/test/{test}', [App\Http\Controllers\Web\UserController::class, 'show_test'])->name('test_show');
Route::post('/test', [App\Http\Controllers\Web\UserController::class, 'store_test'])->name('test_create');
//tema
Route::post('/theme/{theme}/like', [App\Http\Controllers\Web\UserController::class, 'like_theme'])->name('like_theme');
Route::get('/theme', [App\Http\Controllers\Web\UserController::class, 'index_theme'])->name('theme_index');
Route::get('/theme/{theme}', [App\Http\Controllers\Web\UserController::class, 'show_theme'])->name('theme_show');
//actividad
Route::get('/activity', [App\Http\Controllers\Web\UserController::class, 'index_activity'])->name('activity_index');
Route::get('/activity/{activity}', [App\Http\Controllers\Web\UserController::class, 'show_activity'])->name('activity_show');
Route::post('/user-activity/done', [App\Http\Controllers\Web\UserController::class, 'storeUserDone']);
Route::post('/user-activity/like', [App\Http\Controllers\Web\UserController::class, 'storeUserLike']);


//recursos multimedia
Route::get('/media', [App\Http\Controllers\Web\UserController::class, 'index_media'])->name('media_index');
Route::get('/media/{media}', [App\Http\Controllers\Web\UserController::class, 'show_media'])->name('media_show');
Route::get('/notas-por-trimestre', [NoteController::class]);
Route::get('/notas-por-trimestre', [\App\Http\Controllers\Admin\NoteController::class, 'calcularNotasPorTrimestrePorEstudiante']);
