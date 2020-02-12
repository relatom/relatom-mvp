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

use App\Providers\RouteServiceProvider;


Auth::routes();

Route::middleware(['auth'])->group(function () {

	// Redirect to home page chosen by the admin (TODO)
	Route::redirect('/', RouteServiceProvider::HOME);

	// Discussions
	Route::prefix('discussions')->group(function () {
		Route::get('/', 'DiscussionController@index');
	});

	// Events
	Route::prefix('events')->group(function () {
		Route::get('/', 'EventController@upcoming');
		Route::get('/past', 'EventController@past');
		Route::get('/{id}', 'EventController@show');
		Route::post('/{id}/participations', 'EventController@saveParticipations');
		Route::post('/{id}/comments', 'EventController@saveComments');
	});
	
	// Adherents
	Route::prefix('adherents')->group(function () {
	    Route::get('/', 'AdherentController@index');
	    Route::get('/{id}', 'AdherentController@show');   
	});

	// Photos
	Route::prefix('photos')->group(function () {
		Route::get('/', 'PhotoController@index');
	});

	// Files
	Route::prefix('files')->group(function () {
		Route::get('/', 'FileController@index');
	});

	// Settings
	Route::prefix('settings')->group(function () {
	    Route::get('/', 'SettingController@index')->name('settings');  
	});
});