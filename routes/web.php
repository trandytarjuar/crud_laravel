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
Route::get('/device', 'App\Http\Controllers\DeviceController@index')->name('device');
Route::get('/device/get_data', 'App\Http\Controllers\DeviceController@getData')->name('device.get_data');
Route::get('/device/create', 'App\Http\Controllers\DeviceController@create')->name('device.create');
Route::post('/device/store', 'App\Http\Controllers\DeviceController@store')->name('device.store');
Route::get('/device/edit/{id}', 'App\Http\Controllers\DeviceController@edit')->name('device.edit');
Route::post('/device/update/{id}', 'App\Http\Controllers\DeviceController@update')->name('device.update');
Route::get('/device/delete/{id}', 'App\Http\Controllers\DeviceController@destroy')->name('device.delete');
Route::get('/chart', 'App\Http\Controllers\DeviceController@chart')->name('chart.get');
Route::get('/chart/get_data', 'App\Http\Controllers\DeviceController@getchartData')->name('chart.get_data');

