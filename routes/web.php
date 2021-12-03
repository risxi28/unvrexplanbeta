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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/maintenance', 'HomeController@maintenance');


//email
Route::get('/email', function () {
    return view('send_email');
});
Route::post('/sendEmail', 'Email@sendEmail');


//container
Route::get('container', 'ContainerController@index');
Route::get('containeradd', 'ContainerController@create');
Route::post('containerstore', 'ContainerController@store')->name('Container_Model.store');
Route::get('container/{id}/edit', 'ContainerController@edit');
Route::post('container/update', 'ContainerController@update');
//vendor
Route::get('vendor', 'VendorController@index');
Route::get('vendoradd', 'VendorController@create');
Route::post('vendorstore', 'VendorController@store');
Route::get('vendor/{id}/edit', 'VendorController@edit');
Route::post('vendor/update', 'VendorController@update');
Route::get('vendor/{id}/delete', 'VendorController@destroy');
Route::get('vendor/print','VendorController@cetakPDF');
Route::get('vendor/import-export', 'VendorController@importExport');
Route::get('vendor/export/csv', 'VendorController@export_excel_csv');
Route::get('vendor/export/xls', 'VendorController@export_excel_xls');
Route::get('vendor/export/xlsx', 'VendorController@export_excel_xlsx');
Route::post('vendor/import', 'VendorController@storeData');
Route::get('vendor/download/template', 'VendorController@temp_excel');
//destination
Route::get('destination', 'DestinationController@index');
Route::get('destinationadd', 'DestinationController@create');
Route::post('destinationstore', 'DestinationController@store');
Route::get('destination/{id}/edit', 'DestinationController@edit');
Route::post('destination/update', 'DestinationController@update');
Route::get('destination/{id}/delete', 'DestinationController@destroy');
Route::get('destination/print','DestinationController@cetakPDF');
Route::get('destination/import-export', 'DestinationController@importExport');
Route::get('destination/export/csv', 'DestinationController@export_excel_csv');
Route::get('destination/export/xls', 'DestinationController@export_excel_xls');
Route::get('destination/export/xlsx', 'DestinationController@export_excel_xlsx');
Route::post('destination/import', 'DestinationController@storeData');
Route::get('destination/download/template', 'DestinationController@temp_excel');
//category
Route::get('category', 'CategoryController@index');
Route::get('categoryadd', 'CategoryController@create');
Route::post('categorystore', 'CategoryController@store');
Route::get('category/{id}/edit', 'CategoryController@edit');
Route::post('category/update', 'CategoryController@update');
Route::get('category/{id}/delete', 'CategoryController@destroy');
Route::get('category/print','CategoryController@cetakPDF');
Route::get('category/import-export', 'CategoryController@importExport');
Route::get('category/export/csv', 'CategoryController@export_excel_csv');
Route::get('category/export/xls', 'CategoryController@export_excel_xls');
Route::get('category/export/xlsx', 'CategoryController@export_excel_xlsx');
Route::post('category/import', 'CategoryController@storeData');
Route::get('category/download/template', 'CategoryController@temp_excel');
//wh
Route::get('wh', 'whController@index');
Route::get('whadd', 'whController@create');
Route::post('whstore', 'whController@store');
Route::get('wh/{id}/edit', 'whController@edit');
Route::post('wh/update', 'whController@update');
Route::get('wh/{id}/delete', 'whController@destroy');
Route::get('wh/print','whController@cetakPDF');
Route::get('wh/import-export', 'whController@importExport');
Route::get('wh/export/csv', 'whController@export_excel_csv');
Route::get('wh/export/xls', 'whController@export_excel_xls');
Route::get('wh/export/xlsx', 'whController@export_excel_xlsx');
Route::post('wh/import', 'whController@storeData');
Route::get('wh/download/template', 'whController@temp_excel');
//container
Route::get('container', 'ContainerController@index');
Route::get('containeradd', 'ContainerController@create');
Route::post('containerstore', 'ContainerController@store')->name('Container_Model.store');
Route::get('container/{id}/edit', 'ContainerController@edit');
Route::post('container/update', 'ContainerController@update');
//load plan
Route::get('loadplan', 'LoadPlanController@index');
Route::get('import_export', 'LoadPlanController@import_export');

Route::get('loadplanadd', 'LoadPlanController@create');
Route::post('loadplanstore', 'LoadPlanController@store');
Route::get('loadplan/{id}/edit', 'LoadPlanController@edit');
Route::post('loadplan/update', 'LoadPlanController@update');
Route::get('loadplan/{id}/delete', 'LoadPlanController@destroy');
Route::get('loadplan/print','LoadPlanController@cetakPDF');
Route::get('loadplan/import-export', 'LoadPlanController@importExport');
Route::get('loadplan/export/csv', 'LoadPlanController@export_excel_csv');
Route::get('loadplan/export/xls', 'LoadPlanController@export_excel_xls');
Route::get('loadplan/download/template', 'LoadPlanController@temp_excel');
Route::get('loadplan/export/xlsx', 'LoadPlanController@export_excel_xlsx');
Route::post('loadplan/import', 'LoadPlanController@storeData');
Route::get('form', 'LoadPlanController@form');
Route::get('/download', 'LoadPlanController@getDownload');
// Route::get('loadplan/download/template', 'LoadPlanController@temp_excel');

//DH
Route::get('dh', 'DHController@index');
Route::get('dhadd', 'DHController@create');
Route::post('dhstore', 'DHController@store');
Route::get('dh/{id}/edit', 'DHController@edit');
Route::post('dh/update', 'DHController@update');
Route::get('dh/{id}/delete', 'DHController@destroy');
Route::get('dh/print','DHController@cetakPDF');
Route::get('dh/import-export', 'DHController@importExport');
Route::get('dh/export/csv', 'DHController@export_excel_csv');
Route::get('dh/export/xls', 'DHController@export_excel_xls');
Route::get('dh/export/xlsx', 'DHController@export_excel_xlsx');
Route::post('dh/import', 'DHController@storeData');
//SAP
Route::get('sap', 'SAPController@index');
//Route::get('sapdd', 'SAPController@create');
//Route::post('sapstore', 'SAPController@store');
Route::get('sap/{id}/edit', 'SAPController@edit');
//Route::post('sap/update', 'SAPController@update');
Route::get('sap/{id}/delete', 'SAPController@destroy');
Route::get('sap/print','SAPController@cetakPDF');
Route::get('sap/import-export', 'SAPController@importExport');
Route::get('sap/export/csv', 'SAPController@export_excel_csv');
Route::get('sap/export/xls', 'SAPController@export_excel_xls');
Route::get('sap/export/xlsx', 'SAPController@export_excel_xlsx');
Route::post('sap/import', 'SAPController@storeData');
//material
Route::get('material', 'MaterialController@index');
Route::get('materialadd', 'MaterialController@create');
Route::post('materialstore', 'MaterialController@store');
Route::get('material/{id}/edit', 'MaterialController@edit');
Route::post('material/update', 'MaterialController@update');
Route::get('material/{id}/delete', 'MaterialController@destroy');
Route::get('material/{id}/detail', 'MaterialController@show');
Route::get('material/print','MaterialController@cetakPDF');
Route::get('material/import-export', 'MaterialController@importExport');
Route::get('material/export/csv', 'MaterialController@export_excel_csv');
Route::get('material/export/xls', 'MaterialController@export_excel_xls');
Route::get('material/export/xlsx', 'MaterialController@export_excel_xlsx');
Route::post('material/import', 'MaterialController@storeData');
//contenerisasi
Route::get('contenerisasi', 'ContenerisasiController@index');
Route::get('contenerisasi/result', 'ContenerisasiController@search');
//detailplan
Route::get('detailplan', 'DetailplanController@index');


