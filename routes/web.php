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
Route::group(['middleware' => ['email.auth']], function () {
	Route::get('/', 'Dashboard@index')->name('dashboard');
	//Route::get('/reports','Reports@index')->middleware('permission');
	Route::get('/reports','Reports@index');
	Route::get('/report/add','Reports@create');
	Route::get('/report/view/{id}','Reports@show');
	Route::post('/report/destroy','Reports@destroy')->name('delete_report');
	Route::post('/add_report','Reports@store')->name('save_reports');
	Route::get('/reports/reports_view','Reports@reports_view')->name('reports_view');
	
	Route::post('/add_account','Accounts@store')->name('save_accounts');
	Route::get('/users','Users@index');
	Route::get('/location','Locations@index');
	
	
	Route::get('/location/add','Locations@create');
	Route::post('/location/add','Locations@store')->name('save_location');
	
	Route::get('/accounts','Accounts@index');
	Route::get('/account/add','Accounts@create');
	Route::get('/account/edit/{id}','Accounts@edit');
	Route::post('/account/edit/{id}','Accounts@update');
	Route::post('/accounts/destroy','Accounts@destroy')->name('destroy-account');
	
	Route::get('/location/edit/{id}','Locations@edit');
	Route::post('/location/edit/{id}','Locations@update');
	Route::post('/location/destroy','Locations@destroy')->name('destroy-location');
	Route::post('/report/add','Locations@getLocationById')->name('manager-location');
	Route::post('/locations/add','Locations@getUserById')->name('show-manager');
	
	
	Route::get('/user/add','Users@create');
	Route::post('/user/add','Users@store')->name("save_user");
	Route::get('/user/edit/{id}','Users@edit');
	Route::post('/user/edit/{id}','Users@update');
	Route::post('/user/destroy','Users@destroy')->name('destroy-user');
	
	
	Route::post('/report/view','Comments@store')->name('add_comment');
	Route::post('/report','Reports@signature')->name('signature');
	
	Route::get('/profile/settings/{id}','Profile@edit');
	Route::post('/profile/settings/{id}','Profile@update');
	Route::post('/profile/authentication/{id}', 'Profile@authentication');
	
	
	Route::post('/reports/view','Report_images@store')->name('add_image');
	
	Route::get('emails/report_detail_view/{id}', function () {
		return view('emails/report_detail_view');
	});
});
Route::get('/authenticate', 'Auth\LoginController@authentication');
Route::post('/authenticate', 'Auth\LoginController@authentication_check')->name('authentication_check');
Route::get('/logout','Profile@logout')->name('logout');



// Route::get('/edit_user', function(){
// 	return view('users/edit_user');
// });
Auth::routes();

