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

# 機能一覧
Route::get('/menu', function () {
    return view('menu');
})->name('menu');

# 販売会一覧
Route::get('/menu/sales', function () {
    return view('sales');
})->name('sales');

# 販売会/販売会メニュー
Route::get('/menu/sales/{sale_name}', function ($sale_name) {
    return view('sale-menu', ["sale_name" => $sale_name]);
})->name('sale-menu');

# 販売会/購入対象選択
Route::get('/menu/sales/{sale_name}/purchase', function ($sale_name) {
    return view('purchase-target', ["sale_name" => $sale_name]);
})->name('purchase-target');

# 販売会/購入対象選択/購入/商品一覧
Route::get('/menu/sales/{sale_name}/purchase/{target}', function ($sale_name, $target) {
    return view('purchase-supplies', ["sale_name" => $sale_name, "target" => $target]);
})->name('purchase-supplies');

# 販売会/購入対象選択/購入/商品一覧/商品
Route::get('/menu/sales/{sale_name}/purchase/{target}/{supplie}', function ($sale_name, $target, $supplie) {
    return view('purchase-supplie', ["sale_name" => $sale_name, "target" => $target, "supplie" => $supplie]);
})->name('purchase-supplie');

# 販売会/引き渡し対象選択
Route::get('/menu/sales/{sale_name}/delivery', function ($sale_name) {
    return view('delivery-target', ["sale_name" => $sale_name]);
})->name('delivery-target');

# 販売会/引き渡し対象選択/引き渡しチェック
Route::get('/menu/sales/{sale_name}/delivery/{target}', function ($sale_name, $target) {
    return view('delivery-check', ["sale_name" => $sale_name, "target" => $target]);
})->name('delivery-check');

# 販売会/検品
Route::get('/menu/sales/{sale_name}/inspection', function ($sale_name) {
    return view('inspection', ["sale_name" => $sale_name]);
})->name('inspection');

# 販売会一覧画面
Route::get('/menu/supplies', function () {
    return view('supplies-list');
})->name('supplies-list');




Route::get('/contacts', 'ContactController@show');
Route::post('/contacts', 'ContactController@ajax')->name('contacts.ajax');



