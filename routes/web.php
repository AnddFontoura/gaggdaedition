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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@dashboard')->name('dashboard');
Route::get('group', 'GroupController@index')->name('group.index');
Route::get('match', 'MatchesController@index')->name('match.index');

Route::middleware('auth')->prefix('cp')->group(function () {
    
    Route::prefix('user-information')->group(function() {
        Route::get('/', 'UserInformationController@create')->name('user_information.form');
        Route::post('save', 'UserInformationController@store')->name('user_information.save');
    });

});


Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    
    Route::prefix('matches')->group(function() {
        Route::match(['post', 'get'], '/', 'AdminController@matchesIndex')->name('admin.matches');
        Route::post('save', 'AdminController@matchesSave')->name('admin.matches.save');
    });

});
