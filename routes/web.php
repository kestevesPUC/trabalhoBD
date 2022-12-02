<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\Site\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\LoginController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function ()
{
    return view('home');
});

//Route::get('/', [ContatoController::class, 'index']);


// Route::post('/contato', ['uses' => 'ContatoController@criar']);

//Route::get('/contato', [ContatoController::class, 'index']);


//Route::get('/admin', [ContatoController::class, 'admin']);

// Route::put('/contato', ['uses' => 'ContatoController@editar']);
//Route::get('/contato/editar', [ContatoController::class, 'editar']);
//Route::get('/contato/criar', [ContatoController::class, 'criar'])->name('contato.criar');*/

Route::get('/', [HomeController::class, 'index'])->name('site.home');

Route::get('/login', [LoginController::class, 'index'])->name('site.login');


Route::post('/login/newUser', [LoginController::class, 'newUser'])->name('site.newUser');
Route::get('/login/sair', [LoginController::class, 'sair'])->name('site.login.sair');
Route::post('/login/entrar', [LoginController::class, 'entrar'])->name('site.login.entrar');


Route::group(['middleware' => 'auth'], function(){// Autenticação do laravel


    Route::get('/admin/cursos', [ContatoController::class, 'cursos'])->name('admin.cursos.lista');
        // Route::post('/admin/cursos/salvar',['as'=>'admin.cursos.salvar','uses'=>'Admin\CursoController@salvar']);
    Route::post('/admin/cursos/salvar', [ContatoController::class, 'salvar'])->name('admin.cursos.salvar');

    Route::get('/admin/user/', [LoginController::class, 'usuario'])->name('admin.cursos.user');

    Route::post('/admin/user/{id?}', [LoginController::class, 'editUser'])->name('admin.cursos.edituser');

    // Route::get('/admin/cursos/adicionar',['as'=>'admin.cursos.adicionar','uses'=>'Admin\CursoController@adicionar']);
    Route::get('/admin/cursos/adicionar', [ContatoController::class, 'adicionar'])->name('admin.cursos.adicionar');

    // Route::get('/admin/cursos',['as'=>'admin.cursos','uses'=>'Admin\CursoController@index']);
    Route::get('/admin/cursos/{id?}', [ContatoController::class, 'index'])->name('admin.cursos');

    // Route::get('/admin/cursos/editar/{id}',['as'=>'admin.cursos.editar','uses'=>'Admin\CursoController@editar']);
    Route::get('/admin/cursos/editar/{id}', [ContatoController::class, 'editar'])->name('admin.cursos.editar');

    // Route::put('/admin/cursos/atualizar/{id}',['as'=>'admin.cursos.atualizar','uses'=>'Admin\CursoController@atualizar']);
    Route::put('/admin/cursos/atualizar/{id}', [ContatoController::class, 'atualizar'])->name('admin.cursos.atualizar');

    // Route::get('/admin/cursos/deletar/{id}',['as'=>'admin.cursos.deletar','uses'=>'Admin\CursoController@deletar']);
    Route::get('/admin/cursos/deletar/{id}', [ContatoController::class, 'deletar'])->name('admin.cursos.deletar');
});


