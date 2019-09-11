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

Route::get('/menu/sales', function () {
    return view('sales-list');
})->name('sales-list');

Route::get('/menu/olist/{sale_name}', function ($sale_name) {
    return view('sale-menu', ["sale_name"=>$sale_name]);
})->name('sale-menu');

Route::get('/contacts', 'ContactController@show');
Route::post('/contacts', 'ContactController@ajax')->name('contacts.ajax');



