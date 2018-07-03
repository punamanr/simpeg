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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('units','UnitController');
Route::resource('pangkatgolongans','PangkatgolonganController');
Route::resource('agreements','AgreementController');
Route::resource('religions','AgamaController');
Route::resource('positions','PositionController');


// Route::resource('employee','EmployeeController');
// Route::get('employee/create_tkk','EmployeeController@create_tkk')->name('employee.create_tkk');

Route::resource('employees','EmployeeController');
Route::get('/json-kota_kabs','EmployeeController@kota_kabs');
// Route::get('/employee','EmployeeController@index')->name('employee.index');
// Route::get('/employee/create','EmployeeController@create')->name('employee.create');
// Route::post('/employee/create','EmployeeController@store')->name('employee.store');
// Route::get('/employee/create_tkk','EmployeeController@create_tkk')->name('employee.create_tkk');
// Route::get('/employee/index','EmployeeController@index')->name('employee.index');
// Route::get('/employee/destroy','EmployeeController@destroy')->name('employee.destroy');





