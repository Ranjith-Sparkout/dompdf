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
}); 
Route::GET('/download_section','BaseController@download_section'); 
Route::GET('/download_section1','BaseController@download_section1'); 
Route::GET('/download_excel','BaseController@download_excel'); 
Route::GET('/save_excel','BaseController@save_excel'); 
Route::GET('/dom-pdf','BaseController@dom_pdf'); 
Route::GET('/get-excel-data','BaseController@get_excel_data'); 
Route::POST('/get-data','BaseController@get_data'); 
 
