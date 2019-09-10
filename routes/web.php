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
})->name('welcome');

Route::get('/sample', function () {
    return view('sample');
})->name('sample');

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/menu/olist', function () {
    return view('o-list');
})->name('o-list');

Route::get('/menu/olist/{oname}', function ($oname) {
    return view('o-menu', ["oname"=>$oname]);
})->name('o-menu');

Route::get('/contacts', 'ContactController@show');
Route::post('/contacts', 'ContactController@ajax')->name('contacts.ajax');



