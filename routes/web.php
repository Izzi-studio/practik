<?php

use App\Http\Controllers\Front\VacanciesController;

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


//Auth::routes(['verify' => true]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/about', 'HomeController@about')->name('about');
Route::get('/callback', 'HomeController@callback')->name('callback');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/howto', 'HomeController@howto')->name('howto');
Route::get('/services', 'HomeController@services')->name('services');
Route::get('/employer', 'HomeController@employer')->name('employer');

Route::get('/profile','Front\ProfileController@index')->name('profile_view');
Route::put('/profile','Front\ProfileController@update')->name('profile_update');

/* //vacancies need refactor (use binding model)
Route::get('/my-vacancies','Front\VacanciesController@index')->name('my-vacancies')->middleware('EmployerMiddleware');
Route::get('/create-vacancy','Front\VacanciesController@create')->name('create-vacancy')->middleware('EmployerMiddleware');
Route::post('/create-vacancy','Front\VacanciesController@store')->name('store-vacancy')->middleware('EmployerMiddleware');
Route::put('/update-vacancy/{vacancies}','Front\VacanciesController@update')->name('update-vacancy')->middleware('EmployerMiddleware');
Route::get('/edit-vacancy/{vacancies}','Front\VacanciesController@edit')->name('edit-vacancy')->middleware('EmployerMiddleware');
Route::get('/view-vacancy/{vacancies}','Front\VacanciesController@show')->name('view-vacancy');
//end  */

Route::group(['middleware' => 'EmployerMiddleware', ], function(){
    Route::resource('vacancies', '\App\Http\Controllers\Front\VacanciesController')->except(['destroy', 'show']);
});
Route::get('/view-vacancy/{vacancies}', [VacanciesController::class, 'show'])->name('view-vacancy');

Route::get('/change-status-vacancy/{vacancy_id}/{status}','Front\VacanciesController@changeStatusVacancy')->name('change-status-vacancy')->middleware('EmployerMiddleware');;

Route::get('/feedback','Front\VacanciesController@feedback')->name('feedback')->middleware('EmployerMiddleware');

Route::get('/search','Front\VacanciesController@search')->middleware('EmployerMiddleware');

Route::post('/get-states','Front\LocationController@getStatesByCountryId')->name('get-states');
Route::post('/get-cities','Front\LocationController@getCitiesByStateId')->name('get-cities');



Route::post('/check-email','Auth\RegisterController@existsEmail')->name('check-email');
