<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('bbs_top');
// });

Route::get('/', 'EntryItemController@index');
Route::post('/entryitem/create', 'EntryItemController@add');
Route::get('/entryitem/complete', 'EntryItemController@complete');


Route::get('/entry_list', 'PagedEntryItemController@index');