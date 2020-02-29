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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//TO show calorie form 
Route::get('calorie', 'PageController@calorie_form');
//TO calculate the calorie result
Route::post('calorie', 'PageController@calorie_calculation')->name('calorie');


//TO show weight form 
Route::get('weight', 'PageController@weight_form');
//TO calculate the weight result
Route::post('weight', 'PageController@weight_calculation')->name('weight');
 


//TO show water form 
Route::get('water', 'PageController@water_form');
//TO calculate the water result
Route::post('water', 'PageController@water_calculation')->name('water');