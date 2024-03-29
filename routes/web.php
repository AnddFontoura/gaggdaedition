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

use App\Http\Controllers\EditionController;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@dashboard')->name('dashboard');
Route::get('group', 'GroupController@index')->name('group.index');
Route::get('match', 'MatchesController@index')->name('match.index');
Route::get('match/octaves', 'MatchesController@octaves')->name('match.octaves');
Route::get('match/quarters', 'MatchesController@quarters')->name('match.quarters');
Route::get('match/semis', 'MatchesController@semis')->name('match.semis');
Route::get('match/finals', 'MatchesController@finals')->name('match.finals');

Route::middleware('auth')->prefix('cp')->group(function () {
    
    Route::prefix('user-information')->group(function() {
        Route::get('/', 'UserInformationController@create')->name('user_information.form');
        Route::post('save', 'UserInformationController@store')->name('user_information.save');
    });

});

Route::middleware(['auth', 'is_admin'])
->prefix('admin')
->name('admin.')
->group(function () {
    Route::prefix('editions')
    ->name('editions.')
    ->group(function() {
        Route::get('/', [EditionController::class, 'index'])->name('index');
        Route::get('form', [EditionController::class,'create'])->name('create');
        Route::get('form/{id}', [EditionController::class,'create'])->name('edit');
        Route::get('view/{id}', [EditionController::class,'view'])->name('view');
        Route::post('save', [EditionController::class,'save'])->name('save');
        Route::post('save/{id}', [EditionController::class,'update'])->name('update');
        Route::delete('delete/{id}', [EditionController::class,'delete'])->name('delete');
    });

    Route::prefix('matches')->group(function() {
        Route::match(['post', 'get'], '/', 'AdminController@matchesIndex')->name('admin.matches');
        Route::get('new-match', 'AdminController@newMatchForm')->name('admin.matches.new');
        Route::get('new-match/{$id}', 'AdminController@newMatchForm')->name('admin.matches.new.edit');
        Route::get('form', 'AdminController@matchesForm')->name('admin.matches.form');
        Route::get('form/{id}', 'AdminController@matchesForm')->name('admin.matches.edit');
        Route::get('form-result/{id}', 'AdminController@matchResultForm')->name('admin.matches.form_result');
        Route::post('new-save', 'AdminController@newMatchSave')->name('admin.matches.new.save');
        Route::post('new-save/{id}', 'AdminController@newMatchSave')->name('admin.matches.new.update');
        Route::post('save/{id}', 'AdminController@matchesUpdate')->name('admin.matches.update');
        Route::post('save-result/{id}', 'AdminController@matchResultSave')->name('admin.matches.update_result');
    });

});
