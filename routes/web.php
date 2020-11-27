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

// Sprints --- Todas as rotas relacionadas as telas de Sprints
// Lista Sprints
Route::get('/sprints', 'SprintController@index')->name('sprints');
// Formulário de cadastro
Route::get('/sprints/new', 'SprintController@newRender')->name('new-sprint');
// Formulário de edição
Route::get('/sprints/edit/{id}', 'SprintController@editRender')->name('edit-sprint');
// Salva sprint
Route::post('/sprints/store', 'SprintController@store')->name('store-sprint');
// Deleta sprint
Route::get('/sprints/delete/{id}', 'SprintController@destroy')->name('delete-sprint');
// Ver sprint
Route::get('/sprints/{id}', 'SprintController@show')->name('sprint');


// Tarefas --- Todas as rotas relacionadas as telas de Tarefas
Route::prefix('tasks')->group(function () {
    // Lista tarefas
    Route::get('/', 'TaskController@index')->name('tasks');
    // Deleta tarefa
    Route::get('/delete/{id}', 'TaskController@destroy')->name('delete-task');
});