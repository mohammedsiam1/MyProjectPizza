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

Route::get('/',                                 ['as'=>'frontpage',        'uses' =>'App\Http\Controllers\MyController\frontpageController@index']);
Route::get('/show/{id}',                        ['as'=>'Pizza.show',        'uses' =>'App\Http\Controllers\MyController\frontpageController@show']);
Route::post('/store',                            ['as'=>'order.store',        'uses' =>'App\Http\Controllers\MyController\frontpageController@store']);

Route::group(['prefix'=>'admin','middleware'=>'auth','admin'],function(){
    Route::get('/index',                   ['as'=>'index',        'uses' =>'App\Http\Controllers\MyController\PizzaController@index']);

    Route::get('/Pizza/create',                         ['as'=>'Pizza.index',        'uses' =>'App\Http\Controllers\MyController\PizzaController@createPizza']);
    Route::post('/Pizza/store',                         ['as'=>'Pizza.store',        'uses' =>'App\Http\Controllers\MyController\PizzaController@storePizza']);

    Route::get('/Pizza/edit/{id}/edit',                 ['as'=>'Pizza.edit',        'uses' =>'App\Http\Controllers\MyController\PizzaController@editPizza']);
    Route::post('/Pizza/edit/{id}/update',              ['as'=>'Pizza.update',        'uses' =>'App\Http\Controllers\MyController\PizzaController@updatePizza']);
    Route::delete('/Pizza/delete/{id}/delete',          ['as'=>'Pizza.destroy',        'uses' =>'App\Http\Controllers\MyController\PizzaController@destroyPizza']);

    // user order
    Route::get('/user/order',                          ['as'=>'user.order',        'uses' =>'App\Http\Controllers\MyController\UserOrderController@index']);
    Route::post('/order/status{id}',                          ['as'=>'order.status',        'uses' =>'App\Http\Controllers\MyController\UserOrderController@changeStatus']);
// All custom
Route::get('/customers',                          ['as'=>'customers',        'uses' =>'App\Http\Controllers\MyController\UserOrderController@customers']);

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
