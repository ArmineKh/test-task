<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('companies', 'CompanyController')->except([
    'create', 'store'
]);
Route::resource('employes', 'EmployeController')->except([
    'create', 'index', 'show'
]);

Route::get('/employes/create/{id}', [
	'as' =>'employe.create.company_id',
	'uses' => 'EmployeController@create'
]);

Route::get('/comments/{id}', [
	'as' => 'add.comment',
	'uses' => 'CommentsController@store'
]);

Route::post('/comments', [
	'as' => 'post.comment',
	'uses' => 'CommentsController@create'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
