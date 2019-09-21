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

Route::get('/sample', 'SampleController@show')->name('sample.show');

# 機能一覧
Route::get('/menu', 'MenuController@show')->name('menu.show');

# 販売会一覧
Route::get('/menu/sales', function () {
    return view('sales');
})->name('sales');

# 販売会一覧/販売会登録
Route::get('/menu/sales/regist', function () {
    return view('sale-registration');
})->name('sale-registration');

# 販売会一覧/販売会/販売会編集
Route::get('/menu/sales/{sale_name}/edit', function ($sale_name) {
    return view('sale-edit', ["sale_name" => $sale_name]);
})->name('sale-edit');

# 販売会一覧/販売会/販売会メニュー
Route::get('/menu/sales/{sale_name}', function ($sale_name) {
    return view('sale-menu', ["sale_name" => $sale_name]);
})->name('sale-menu');

# 販売会一覧/販売会/購入対象選択
Route::get('/menu/sales/{sale_name}/purchase', function ($sale_name) {
    return view('purchase-target', ["sale_name" => $sale_name]);
})->name('purchase-target');

# 販売会一覧/販売会/購入対象選択/購入/用品一覧
Route::get('/menu/sales/{sale_name}/purchase/{target}', function ($sale_name, $target) {
    return view('purchase-supplies', ["sale_name" => $sale_name, "target" => $target]);
})->name('purchase-supplies');

# 販売会一覧/販売会/購入対象選択/購入/用品一覧/用品
Route::get('/menu/sales/{sale_name}/purchase/{target}/{supplie}', function ($sale_name, $target, $supplie) {
    return view('purchase-supplie', ["sale_name" => $sale_name, "target" => $target, "supplie" => $supplie]);
})->name('purchase-supplie');

# 販売会一覧/販売会/引き渡し対象選択
Route::get('/menu/sales/{sale_name}/delivery', function ($sale_name) {
    return view('delivery-target', ["sale_name" => $sale_name]);
})->name('delivery-target');

# 販売会一覧/販売会/引き渡し対象選択/引き渡しチェック
Route::get('/menu/sales/{sale_name}/delivery/{target}', function ($sale_name, $target) {
    return view('delivery-check', ["sale_name" => $sale_name, "target" => $target]);
})->name('delivery-check');

# 販売会一覧/販売会/検品
Route::get('/menu/sales/{sale_name}/inspection', function ($sale_name) {
    return view('inspection', ["sale_name" => $sale_name]);
})->name('inspection');

# 販売会一覧/販売会/検品
Route::get('/menu/sales/{sale_name}/order', function ($sale_name) {
    return view('order-status', ["sale_name" => $sale_name]);
})->name('order-status');

# 取引先一覧
Route::get('/menu/suppliers', 'SuppliersController@show')->name('suppliers.show');

# 取引先一覧/取引先登録
Route::get('/menu/suppliers/regist', 'SupplierRegistrationController@show')->name('supplier-registration.show');
Route::post('/menu/suppliers/regist', 'SupplierRegistrationController@store')->name('supplier-registration.store');

# 取引先一覧/取引先
Route::get('/menu/suppliers/{supplier}', function (App\models\Supplier $supplier) {
    return view('supplier-menu', ["supplier" => $supplier]);
})->name('supplier-menu');

# 取引先一覧/取引先/取引先編集
Route::get('/menu/suppliers/{supplier_id}/edit', 'SupplierEditController@show')->name('supplier-edit.show');
Route::post('/menu/suppliers/{supplier_id}/edit', 'SupplierEditController@edit')->name('supplier-edit.edit');

# 取引先一覧/取引先/用品一覧
/*
Route::get('/menu/suppliers/{supplier}/supplies', function (App\models\Supplier $supplier) {
    return view('supplies', ["supplier" => $supplier]);
})->name('supplies');
*/
Route::get('/menu/suppliers/{supplier}/supplies', 'SuppliesController@show')->name('supplies');

Route::get('/contacts', 'ContactController@show');
Route::post('/contacts', 'ContactController@ajax')->name('contacts.ajax');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
