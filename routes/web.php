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

// リソースコントローラー:確認画面が今回はパス
// Route::resource('/engineers', 'EngineerController');
// Route::post('/engineers', 'EngineerController@index'); 
Route::get('/engineers', 'EngineerController@index'); 
Route::get('/engineers/create', 'EngineerController@create')->name('engineers.create');
Route::post('engineers/confirm','EngineerController@confirm')->name('engineers.confirm');
Route::post('/engineers/store', 'EngineerController@store')->name('engineers.store');
Route::get('/engineers/{id}', 'EngineerController@show')->name('engineers.show'); 
Route::get('/engineers/{id}/edit', 'EngineerController@edit')->name('engineers.edit'); 
Route::post('/engineers/update/{id}', 'EngineerController@update')->name('engineers.update'); 
Route::post('/engineers/delete/{id}', 'EngineerController@delete')->name('engineers.delete'); 
Route::get('/download', 'EngineerController@download');
// ルートに/statusを追加
Route::post('/engineers', 'EngineerController@status'); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
