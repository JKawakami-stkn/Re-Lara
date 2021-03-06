<?php

use App\Http\Controllers\SaleEditController;
use App\models\Supplier;
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

### 一括注文 #####################################################################################

# 販売会一覧
Route::get('/menu/sales', "SalesTopController@show")->name('sales');
Route::get('/menu/sales/load/{radio_id?}', "SalesTopController@load")->name('sales.load');

# 販売会一覧/販売会登録
Route::get('/menu/sales/regist',"SaleRegistrationController@show")->name('sale-registration');
Route::post('/menu/sales/regist',"SaleRegistrationController@store")->name('sale-registration.store');
Route::get('/menu/sales/regist/load/{division_id?}',"SaleRegistrationController@load")->name('sale-registrationLoad');

# 販売会一覧/販売会/販売会編集
Route::get('/menu/sales/{sale_id}/edit','SaleEditController@show')->name('sale-edit');

Route::post('/menu/sales/{sale_id}/edit','SaleEditController@store')->name('sale-editStore');

# 販売会一覧/販売会/販売会メニュー
Route::get('/menu/sales/{sale_id}','SaleMenuController@show')->name('sale-menu');

# 販売会一覧/販売会/購入対象選択
Route::get('/menu/sales/{sale_id}/purchase','PurchaseTargetController@show')->name('purchase-target');
Route::post('/menu/sales/{sale_id}/purchase/load/{GP_CD?}', 'PurchaseTargetController@load')->name('purchase-target.load');
Route::post('/menu/sales/{sale_id}/purchase','PurchaseTargetController@store')->name('purchase-target.store');

# 販売会一覧/販売会/購入対象選択/購入/用品一覧
Route::get('/menu/sales/{sale_id}/purchase/{target}','PurchaseSuppliesController@show')->name('purchase-supplies');
Route::get('/menu/sales/{sale_id}/purchase/{target}/load/{division_id?}','PurchaseSuppliesController@load')->name('purchase-supplies.load');
# 販売会一覧/販売会/購入対象選択/購入/用品一覧/用品
Route::get('/menu/sales/{sale_id}/purchase/{target}/{supplie_id}','PurchaseSupplieController@show')->name('purchase-supplie');
Route::post('/menu/sales/{sale_id}/purchase/{target}/{supplie_id}','PurchaseSupplieController@store')->name('purchase-supplie.store');

# 販売会一覧/販売会/引き渡し対象選択
Route::get('/menu/sales/{sale_id}/delivery', 'DeliveryTargetController@show')->name('delivery-target');
Route::post('/menu/sales/{sale_id}/delivery/load/{GP_CD?}', 'DeliveryTargetController@load')->name('delivery-target.load');
Route::post('/menu/sales/{sale_id}/delivery','DeliveryTargetController@store')->name('delivery-target.store');

# 販売会一覧/販売会/引き渡し対象選択/引き渡しチェック
Route::get('/menu/salRes/{sale_id}/delivery/{target}','DeliveryCheckController@show')->name('delivery-check.show');
Route::post('/menu/sales/{sale_id}/delivery/{target}','DeliveryCheckController@store')->name('delivery-check.store');

# 販売会一覧/販売会/検品
Route::get('/menu/sales/{sale_name}/inspection', function ($sale_name) {
    return view('inspection', ["sale_name" => $sale_name]);
})->name('inspection');

# 販売会一覧/販売会/販売会チェック対象選択
Route::get('/menu/sales/{sale_id}/order','OrdersStatusController@show' )->name('orders-status');
Route::post('/menu/sales/{sale_id}/order/load/{GP_CD?}', 'OrdersStatusController@load')->name('orders-status.load');
Route::post('/menu/sales/{sale_id}/order','OrdersStatusController@store')->name('orders-status.store');

#販売会一覧/販売会/販売会チェック対象選択/注文内容確認
Route::get('/menu/sales/{sale_id}/order/{kids_id}','OrderStatusController@show' )->name('order-status.show');
Route::post('/menu/sales/{sale_id}/order/{kids_id}', 'OrderStatusController@store')->name('order-status.store');
Route::post('/menu/sales/{sale_id}/order/{kids_id}/delete/{order_id}', 'OrderStatusController@delete')->name('order-status.delete');

# 販売会一覧/販売会/印刷
Route::get('/menu/sales/{sale_id}/print','PrintController@show' )->name('print.show');

# 販売会一覧/販売会/メール送信タイプ選択
Route::get('/menu/sales/{sale_id}/mail','MailTargetTypeController@show' )->name('mail-target-type.show');

# 販売会一覧/販売会/メール送信タイプ選択/メール送信確認
Route::get('/menu/sales/{sale_id}/mail/all', 'MailAllConfirmController@show')->name('mail-all-confirm.show');
Route::post('/menu/sales/{sale_id}/mail/all/confirm', 'MailAllConfirmController@send')->name('mail-all-confirm.send');

# 販売会一覧/販売会/メール送信タイプ選択/組選択
Route::get('/menu/sales/{sale_id}/mail/class', 'MailClassSelectController@show')->name('mail-class-select.show');

# 販売会一覧/販売会/メール送信タイプ選択/組選択/送信確認
Route::get('/menu/sales/{sale_id}/mail/class/confirm', 'MailClassConfirmController@show')->name('mail-class-confirm.show');
Route::post('/menu/sales/{sale_id}/mail/class/confirm/{class_id}', 'MailClassConfirmController@send')->name('mail-class-confirm.send');

# 販売会一覧/販売会/メール送信タイプ選択/個人選択
Route::get('/menu/sales/{sale_id}/mail/personal', 'MailPersonalSelectController@show')->name('mail-personal-select.show');

# 販売会一覧/販売会/メール送信タイプ選択/個人選択/送信確認
Route::get('/menu/sales/{sale_id}/mail/personal/confirm', 'MailPersonalConfirmController@show')->name('mail-personal-confirm.show');
Route::post('/menu/sales/{sale_id}/mail/personal/confirm/{kid}', 'MailPersonalConfirmController@send')->name('mail-personal-confirm.send');

# 販売会一覧/販売会/メール送信タイプ選択/個人選択/送信完了
Route::get('/menu/sales/{sale_id}/mail/personal/send', 'MailPersonalConfirmController@show')->name('mail-personal-confirm.show');

# 販売会一覧/販売会/メール/送信結果
Route::get('/menu/sales/{sale_id}/mail/result', 'MailResultController@show')->name('mail-result.show');

### 個別注文 #####################################################################################

# 個別注文一覧
Route::get('/menu/porders', 'PersonalOrdersController@show')->name('personal-orders.show');
Route::get('/menu/porders/load/{sibori?}/{narabi?}', 'PersonalOrdersController@load')->name('personal-orders.load');

# 個別注文一覧/注文登録
Route::get('/menu/porders/regist', 'PersonalOrderRegistrationController@show')->name('personal-order-registration.show');
Route::post('/menu/porders/regist/load/{GP_CD?}', 'PersonalOrderRegistrationController@load')->name('personal-order-registration.load');
Route::post('/menu/porders/regist', 'PersonalOrderRegistrationController@store')->name('personal-order-registration.store');

# 個別注文一覧/注文
Route::get('/menu/porders/{personal_sale}', 'PersonalOrderMenuController@show')->name('personal-order-menu.show');

# 個別注文一覧/注文/用品一覧
Route::get('/menu/porders/{personal_sale}/purchase', 'PersonalPurchaseSuppliesController@show')->name('personal-purchase-supplies.show');
Route::get('/menu/porders/{personal_sale}/purchase/load/{division_id?}', 'PersonalPurchaseSuppliesController@load')->name('personal-purchase-supplies.load');
// Route::post('/menu/porders/{personal_sale}/purchase', 'PersonalPurchaseSuppliesController@store')->name('personal-purchase-supplies.store');

# 個別注文一覧/注文/用品一覧/用品
Route::get('/menu/porders/{personal_sale}/purchase/{supplie}', 'PersonalPurchaseSupplieController@show')->name('personal-purchase-supplie.show');
Route::post('/menu/porders/{personal_sale}/purchase/{supplie}', 'PersonalPurchaseSupplieController@store')->name('personal-purchase-supplie.store');

# 個別注文一覧/注文/注文内容確認
Route::get('/menu/porders/{personal_sale}/order', 'PersonalPurchaseCheckController@show')->name('personal-purchase-check.show');
Route::post('/menu/porders/{personal_sale}/order/delete/{order}', 'PersonalPurchaseCheckController@delete')->name('personal-purchase-check.delete');
Route::post('/menu/porders/{personal_sale}/order', 'PersonalPurchaseCheckController@store')->name('personal-purchase-check.store');

# 個別注文一覧/注文/引き渡し
Route::get('/menu/porders/{personal_sale}/delivery', 'PersonalPurchaseDeliveryController@show')->name('personal-purchase-delivery.show');
Route::post('/menu/porders/{personal_sale}/delivery', 'PersonalPurchaseDeliveryController@store')->name('personal-purchase-delivery.store');

# 個別注文一覧/注文編集
Route::get('/menu/porders/{personal_sale}/edit','PersonalOrderEditController@show')->name('personal-order-edit.show');
Route::post('/menu/porders/{personal_sale}/edit', 'PersonalOrderEditController@store')->name('personal-order-edit.store');

# 個別注文一覧/注文/注文書印刷
Route::get('/menu/porders/{personal_sale}/print', 'PersonalPurchasePrintController@show')->name('personal-purchase-print.show');

# 個別注文一覧/注文/メール
Route::get('/menu/porders/{personal_sale}/mail', 'PersonalPurchaseMailController@show')->name('personal-purchase-mail.show');
Route::post('/menu/porders/{personal_sale}/mail', 'PersonalPurchaseMailController@send')->name('personal-purchase-mail.send');

# 個別注文一覧/注文/メール/送信結果
Route::get('/menu/porders/{personal_sale}/mail/send', 'PersonalPurchaseMailSendController@show')->name('personal-purchase-mail-send.show');

### 取引先登録 #####################################################################################

# 取引先一覧
Route::get('/menu/suppliers', 'SuppliersController@show')->name('suppliers.show');

# 取引先一覧/取引先登録
Route::get('/menu/suppliers/regist', 'SupplierRegistrationController@show')->name('supplier-registration.show');
Route::post('/menu/suppliers/regist', 'SupplierRegistrationController@store')->name('supplier-registration.store');

# 取引先一覧/取引先
Route::get('/menu/suppliers/{supplier}','SupplierMenuController@show')->name('supplier-menu');
Route::post('/menu/suppliers/{supplier}','SupplierMenuController@delete')->name('supplier-delete');

# 取引先一覧/取引先/取引先編集
Route::get('/menu/suppliers/{supplier}/edit', 'SupplierEditController@show')->name('supplier-edit.show');
Route::post('/menu/suppliers/{supplier}/edit', 'SupplierEditController@edit')->name('supplier-edit.edit');

# 取引先一覧/取引先/用品一覧
Route::get('/menu/suppliers/{supplier}/supplies', 'SuppliesController@show')->name('supplies');

# 取引先一覧/取引先/用品一覧/用品登録
Route::get('/menu/suppliers/{supplier}/supplies/regist', 'SupplieRegistrationController@show')->name('supplie-registration.show');
Route::post('/menu/suppliers/{supplier}/supplies/regist', 'SupplieRegistrationController@store')->name('supplie-registration.store');

# 取引先一覧/取引先/用品一覧/用品
Route::get('/menu/suppliers/{supplier}/supplies/{supplie}', 'SupplieMenuController@show')->name('supplie-menu.show');
Route::post('/menu/suppliers/{supplier}/supplies/{supplie}', 'SupplieMenuController@delete')->name('supplie-menu.delete');

# 取引先一覧/取引先/用品一覧/用品/用品編集
Route::get('/menu/suppliers/{supplier}/supplies/{supplie}/edit', 'SupplieEditController@show')->name('supplie-edit.show');
Route::post('/menu/suppliers/{supplier}/supplies/{supplie}/edit', 'SupplieEditController@edit')->name('supplie-edit.edit');

Route::get('/contacts', 'ContactController@show');
Route::post('/contacts', 'ContactController@ajax')->name('contacts.ajax');

### 保護者入力 #####################################################################################


# ユーザー/個別注文id/用品一覧
Route::get('/ps/{personal_sale_id}/{token}', 'PersonalPurchaseParentInputSupplieListController@show')->name('personal-purchase-parent-input-supplie-list.show');

# ユーザー/個別注文id/用品一覧/用品
Route::get('/ps/{personal_sale_id}/{token}/supplie/{supplie_id}', 'PersonalPurchaseParentInputSupplieController@show')->name('personal-purchase-parent-input-supplie.show');
Route::post('/ps/{personal_sale_id}/{token}/supplie/{supplie_id}', 'PersonalPurchaseParentInputSupplieController@store')->name('personal-purchase-parent-input-supplie.store');

# ユーザー/個別注文id/カート
Route::get('/ps/{personal_sale_id}/{token}/cart', 'PersonalPurchaseParentCartController@show')->name('personal-purchase-parent-cart.show');
Route::post('/ps/{personal_sale_id}/{token}/cart', 'PersonalPurchaseParentCartController@store')->name('personal-purchase-parent-cart.store');

# ユーザー/販売会id/用品一覧
Route::get('/s/{sale_id}/{token}', 'ParentInputSupplieListController@show')->name('parent-input-supplie-list.show');

# ユーザー/販売会id/用品一覧/用品
Route::get('/s/{sale_id}/{token}/supplie/{supplie_id}', 'ParentInputSupplieController@show')->name('parent-input-supplie.show');
Route::post('/s/{sale_id}/{token}/supplie/{supplie_id}', 'ParentInputSupplieController@store')->name('parent-input-supplie.store');

# ユーザー/販売会id/カート
Route::get('/s/{sale_id}/{token}/cart', 'ParentCartController@show')->name('parent-cart.show');
Route::post('/s/{sale_id}/{token}/cart', 'ParentCartController@store')->name('parent-cart.store');
Route::post('/s/{sale_id}/{token}/cart/delete/{order}', 'ParentCartController@delete')->name('parent-cart.delete');


### その他 #####################################################################################

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
