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
Route::resource('bpjs_masters','Bpjs_masterController');
Route::match(['put','patch'],'bpjs_masters/update_umk/{id}','Bpjs_masterController@update_umk')->name('bpjs_masters.update_umk');
Route::resource('users','UserController');
Route::resource('educations','EducationController');








// Route::resource('employee','EmployeeController');
// Route::get('employee/create_tkk','EmployeeController@create_tkk')->name('employee.create_tkk');

Route::resource('employees','EmployeeController');
//route untuk export data dalam format excel
Route::get('export','EmployeeController@employeeExport')->name('employee.export');
Route::delete('employees/{id}','EmployeeController@hapus_pegawai')->name('employee.hapus');
Route::get('/json-kota_kabs/{id}','EmployeeController@kota_kabs');
Route::get('/data_tkk/{id}','AgreementController@get_tkk');

// Route::get('/employees/edit/{id}','EmployeeController@edit')->name('employee.edit');
// Route::post('/employees/edit/{id}','EmployeeController@update')->name('employee.update');
// Route::get('/employees','EmployeeController@index')->name('employee.index');
// Route::get('/employees/create','EmployeeController@create')->name('employee.create');
// Route::post('/employees/create','EmployeeController@store')->name('employee.store');
// Route::get('/employees/destroy','EmployeeController@destroy')->name('employee.destroy');

// Route::get('/employee/create_tkk','EmployeeController@create_tkk')->name('employee.create_tkk');
// Route::get('/employee/index','EmployeeController@index')->name('employee.index');



