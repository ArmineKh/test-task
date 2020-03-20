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

Route::get('/register', [ 'as' => 'register', 'uses' => 'CompanyController@register']);
Route::post('/register', [ 'as' => 'register', 'uses' => 'CompanyController@registration']);

Route::get('/login', [ 'as' => 'login', 'uses' => 'CompanyController@login']);
Route::post('/login', [ 'as' => 'login', 'uses' => 'CompanyController@logInPost']);

Route::post('/logout', [ 'as' => 'logout', 'uses' => 'CompanyController@logout']);


Route::get('/', function () {
    return view('welcome');
});
Route::resource('companies', 'CompanyController')->except([
    'create', 'store'
])->middleware('islogin');
Route::resource('employes', 'EmployeController')->except([
    'create', 'index', 'show'
]);

Route::get('/employes/create/{id}', [
	'as' =>'employe.create.company_id',
	'uses' => 'EmployeController@create'
]);

Route::get('/comments/{id}', [
	'as' => 'add.comment',
	'uses' => 'CommentsController@create'
]);

Route::post('/comments', [
	'as' => 'post.comment',
	'uses' => 'CommentsController@store'
]);


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
