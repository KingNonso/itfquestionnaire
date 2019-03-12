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
    return view('index');
});
Route::get('/thanks', function () {
    return view('thanks');
});

Route::get('/state-chart', 'HomeController@state');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/benefit', 'HomeController@benefit')->name('benefit');
Route::get('/knowledge', 'HomeController@knowledge')->name('knowledge');
Route::get('/education', 'HomeController@education')->name('education');

Route::post('processor', [
    'as' => 'processor',
    'uses' => 'MainController@store'
]);
