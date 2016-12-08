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
    
    Route::get("palindroom","pagesController@index");
    Route::post("palindroomResult","pagesController@result");
    Route::get("palindroomResult","pagesController@result");
    
    Route::get("repeatedDigits","repeatedDigits@index");
    Route::post("digitsResult","repeatedDigits@value");
    Route::get("digitsResult","repeatedDigits@value");
    
    Route::get("nanoSays/{id}","nanoSaysController@index");
