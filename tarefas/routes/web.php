<?php

//use Illuminate\Routing\Route;
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

    Route::group(['prefix'=>'tarefas','where'=>['id'=>'[0-9]+']], function(){
       
        Route::get('',['as' => 'tarefas', 'uses' => 'TarefasController@index']);
        Route::get('create',['as' => 'tarefas.create', 'uses' => 'TarefasController@create']);
        Route::post('store',['as' => 'tarefas.store','uses' => 'TarefasController@store']);
        Route::get('destroy/{id}',['as' => 'tarefas.destroy', 'uses' => 'TarefasController@destroy']);
        Route::get('edit/{id}',['as' => 'tarefas.edit', 'uses' => 'TarefasController@edit']);
        Route::put('update/{id}',['as' => 'tarefas.update', 'uses' => 'TarefasController@update']);
    });
