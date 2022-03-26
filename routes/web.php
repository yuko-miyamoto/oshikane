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
    Route::get('main/profile', 'Admin\MainController@profile');
    Route::get('main/test', 'Admin\Ajax\MainController@profile');
    
    Route::get('oshi/create', 'Admin\OshiController@add');
    Route::post('oshi/create', 'Admin\OshiController@create');
    Route::get('oshi', 'Admin\OshiController@index');
    Route::get('oshi/edit', 'Admin\OshiController@edit');
    Route::post('oshi/edit', 'Admin\OshiController@update');
    Route::get('oshi/delete', 'Admin\OshiController@delete');
    
    Route::get('gate/create', 'Admin\GateController@add');
    Route::Post('gate/create', 'Admin\GateController@update');
    Route::get('gate', 'Admin\GateController@index');
   
    Route::get('memory/create', 'Admin\MemoryController@add');
    Route::post('memory/create', 'Admin\MemoryController@create');
    Route::get('memory/index/', 'Admin\MemoryController@index');
    Route::get('memory/edit', 'Admin\MemoryController@edit');
    Route::post('memory/edit', 'Admin\MemoryController@update');
    Route::get('memory/delete', 'Admin\MemoryController@delete');
    
    Route::get('expense/create', 'Admin\ExpenseController@add');
    Route::post('expense/create', 'Admin\ExpenseController@create');
    Route::get('expense', 'Admin\ExpenseController@index');
    Route::get('ajax/expense', 'Admin\Ajax\ExpenseController@index');
    Route::get('expense/expenseindex', 'Admin\ExpenseController@expenseindex');
    
    Route::get('saving/create', 'Admin\SavingController@add');
    Route::post('saving/create', 'Admin\SavingController@create');
    Route::get('saving', 'Admin\SavingController@index');
    Route::get('ajax/saving', 'Admin\Ajax\SavingController@index');
    
    Route::get('budget/create', 'Admin\BudgetController@add');
    Route::post('budget/create', 'Admin\BudgetController@create');
    Route::get('budget/index', 'Admin\BudgetController@index');
    Route::get('budget/edit', 'Admin\BudgetController@edit');
    Route::post('budget/edit', 'Admin\BudgetController@update');
    
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

Route::get('/home', 'HomeController@index')->name('home');
