<?php

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
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('pacientes', 'Cadastros\PacientesController');
Route::resource('turmas', 'Cadastros\TurmasController');

Route::get('/pdf-lista-chamada-turma/{id}', 'PDF\PDFController@pdfListaChamada');
