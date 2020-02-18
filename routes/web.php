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

	Route::get('/about', 'PageController@about')->name('about');

	// Discussions
	Route::prefix('discussions')->name('discussions.')->group(function () {
		Route::get('/', 'PageController@discussion');
	});

	// Events
	Route::prefix('events')->name('events.')->group(function () {
		Route::get('/', 'EventController@upcoming')->name('index');
		Route::get('/past', 'EventController@past');
		Route::get('/{id}', 'EventController@show');
		Route::post('/{id}/participations', 'EventController@saveParticipations');
		Route::post('/{id}/comments', 'EventController@saveComments');
		Route::get('/{id}/comments', 'EventController@showComments');
	});
	
	// Adherents
	Route::prefix('adherents')->name('adherents.')->group(function () {
	    Route::get('/', 'AdherentController@index');
	    // Route::get('/{id}', 'AdherentController@show');   
	});

	// Photos
	Route::prefix('photos')->name('photos.')->group(function () {
		Route::get('/', 'PageController@photo');
	});

	// Files
	Route::prefix('files')->name('files.')->group(function () {
		Route::get('/', 'PageController@file');
	});

	// Settings
	Route::prefix('settings')->group(function () {
	    Route::get('/', 'SettingController@index')->name('settings');  
	});
});