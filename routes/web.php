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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    
    Route::get('main/index', 'Admin\MainController@index');
    Route::post('main/like', 'Admin\OshiLikeController@oshi_like');
    Route::get('main/profile', 'Admin\MainController@profile');
    Route::get('main/profilechart', 'Admin\Ajax\MainController@profile');
    
    Route::get('oshi/create', 'Admin\OshiController@add');
    Route::post('oshi/create', 'Admin\OshiController@create');
    Route::get('oshi/index', 'Admin\OshiController@index');
    Route::get('oshi/edit', 'Admin\OshiController@edit');
    Route::post('oshi/edit', 'Admin\OshiController@update');
    Route::get('oshi/delete', 'Admin\OshiController@delete');
    
    Route::get('notify/oshiadd', 'Admin\NotifyController@add');
    Route::Post('notify/oshiadd', 'Admin\NotifyController@oshiadd');
    Route::get('notify/index', 'Admin\NotifyController@index');
    Route::get('notify/edit', 'Admin\NotifyController@edit');
    Route::post('notify/edit', 'Admin\NotifyController@update');
   
    Route::get('memory/create', 'Admin\MemoryController@add');
    Route::post('memory/create', 'Admin\MemoryController@create');
    Route::get('memory/index/', 'Admin\MemoryController@index');
    Route::get('memory/edit', 'Admin\MemoryController@edit');
    Route::post('memory/edit', 'Admin\MemoryController@update');
    Route::get('memory/delete', 'Admin\MemoryController@delete');
    
    Route::get('expense/create', 'Admin\ExpenseController@add');
    Route::post('expense/create', 'Admin\ExpenseController@create');
    Route::get('expense/index', 'Admin\ExpenseController@index');
    Route::get('expense/edit', 'Admin\ExpenseController@edit');
    Route::post('expense/edit', 'Admin\ExpenseController@update');
    Route::get('expense/delete', 'Admin\ExpenseController@delete');
    
    Route::get('balancepayment', 'Admin\BalancepaymentController@chartindex');
    Route::get('ajax/balancepayment', 'Admin\Ajax\BalancepaymentController@chartindex');
    
    Route::get('saving/create', 'Admin\SavingController@add');
    Route::post('saving/create', 'Admin\SavingController@create');
    Route::get('saving/detail_index', 'Admin\SavingController@detail_index');
    Route::get('saving/edit', 'Admin\SavingController@edit');
    Route::post('saving/edit', 'Admin\SavingController@update');
    Route::get('saving/delete', 'Admin\SavingController@delete');
    
    Route::get('saving', 'Admin\SavingController@index');
    Route::get('ajax/saving', 'Admin\Ajax\SavingController@index');
    
    Route::get('budget/create', 'Admin\BudgetController@add');
    Route::post('budget/create', 'Admin\BudgetController@create');
    Route::get('budget/index', 'Admin\BudgetController@index');
    Route::get('budget/edit', 'Admin\BudgetController@edit');
    Route::post('budget/edit', 'Admin\BudgetController@update');
    Route::get('budget/delete', 'Admin\BudgetController@delete');
    
    Route::get('user/profile', 'Admin\UserController@add');
    Route::post('user/profile', 'Admin\UserController@profile_create');
    Route::get('user/edit', 'Admin\UserController@edit');
    Route::post('user/edit', 'Admin\UserController@update');
    Route::get('user/search', 'Admin\UserController@search');
    Route::post('user/search', 'Admin\UserController@search');
    Route::get('user/followresult', 'Admin\UserController@followresult');
    Route::post('user/search/', 'Admin\FollowerController@store');
    Route::get('user/delete', 'Admin\FollowerController@delete');
    Route::get('user/followlist/', 'Admin\UserController@index');
    
});
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

