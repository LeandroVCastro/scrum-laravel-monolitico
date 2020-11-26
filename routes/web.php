<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


// PROJETOS --- Todas as rotas relacionadas as telas de projetos
// Lista projetos
Route::get('/projects', 'ProjectsController@index')->name('projects');
// Formulário de cadastro
Route::get('/projects/new', 'ProjectsController@newRender')->name('new-project');
// Formulário de edição
Route::get('/projects/edit/{id}', 'ProjectsController@editRender')->name('edit-project');
// Salva projeto
Route::post('/projects/store', 'ProjectsController@store')->name('store-project');
// Deleta projeto
Route::get('/projects/delete/{id}', 'ProjectsController@destroy')->name('delete-project');
// Ver projeto
Route::get('/projects/{id}', 'ProjectsController@show')->name('project');