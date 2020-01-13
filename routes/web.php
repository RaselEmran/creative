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
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'admin', 'middleware' => ['auth']], function () {

	 Route::any('setting','SettingController@index')->name('setting');

	 Route::match(['get', 'post'], 'profile', 'ProfileController@profile')->name('profile');
	 Route::match(['get', 'post'], 'password', 'ProfileController@password_change')->name('password');
	 Route::get('logs', 'ProfileController@user_logs')->name('user_log');

	Route::group(['as' => 'user.', 'prefix' => 'user'], function () {
		 Route::resource('role','RoleController');
		 Route::put('change-status/{value}/{id}','UserController@status')->name('change_status');
		 Route::resource('user-manage','UserController');

	  });
		 Route::get('language','LanguageController@index')->name('language');
		 Route::match(['get', 'post'], 'create', 'LanguageController@create')->name('language.create');

		 Route::get('language/edit/{id?}', 'LanguageController@edit')->name('language.edit');
		 Route::patch('language/update/{id}', 'LanguageController@update')->name('language.update');
		 Route::delete('/language/delete/{id}', 'LanguageController@delete')->name('language.delete');

		 //customer
		 Route::resource('customer','CustomerController');
		 //supplier
		 Route::resource('supplier','SupplierController');


 });

Route::get('/home', 'HomeController@index')->name('home');
