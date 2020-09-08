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

Route::get('/projects', 'ProjectsController@index')->name('projects');
Route::get('/projects/new', 'ProjectsController@newRender')->name('new-project');
// Route::get('/home', 'HomeController@index')->name('home');
