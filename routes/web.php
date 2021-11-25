<?php

use App\Http\Controllers\Front\VacancyController;


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

Auth::routes(['verify' => true]);
Auth::routes();
Route::post('/check-email','Auth\RegisterController@existsEmail')->name('check-email'); //check email in db
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

//static page
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/callback', 'HomeController@callback')->name('callback');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/howto', 'HomeController@howto')->name('howto');
Route::get('/services', 'HomeController@services')->name('services');
Route::get('/employer', 'HomeController@employer')->name('employer');
//static page end

//profile
Route::get('/profile','Front\ProfileController@index')->name('profile_view');
Route::put('/profile','Front\ProfileController@update')->name('profile_update');
Route::get('/profile/my-vacancies', 'Front\ProfileController@myVacancy')->name('my-vacancies');

//profile end

//employers routes
Route::group(['middleware' => 'EmployerMiddleware', ], function(){
    Route::resource('vacancies', '\App\Http\Controllers\Front\VacancyController');
	Route::get('/change-status-vacancy/{vacancy_id}/{status}','Front\VacancyController@changeStatusVacancy')->name('change-status-vacancy');//to do
	Route::get('/feedback','Front\VacancyController@feedback')->name('feedback');//to do
	Route::get('/search','Front\VacancyController@search')->name('search'); //to do
});
//employers routes end

//Route::post('/get-states','Front\LocationController@getStatesByCountryId')->name('get-states');
//Route::post('/get-cities','Front\LocationController@getCitiesByStateId')->name('get-cities');
/* //vacancies need refactor (use binding model)
Route::get('/my-vacancies','Front\VacancyController@index')->name('my-vacancies')->middleware('EmployerMiddleware');
Route::get('/create-vacancy','Front\VacancyController@create')->name('create-vacancy')->middleware('EmployerMiddleware');
Route::post('/create-vacancy','Front\VacancyController@store')->name('store-vacancy')->middleware('EmployerMiddleware');
Route::put('/update-vacancy/{vacancies}','Front\VacancyController@update')->name('update-vacancy')->middleware('EmployerMiddleware');
Route::get('/edit-vacancy/{vacancies}','Front\VacancyController@edit')->name('edit-vacancy')->middleware('EmployerMiddleware');
Route::get('/view-vacancy/{vacancies}','Front\VacancyController@show')->name('view-vacancy');
//end  */

Route::group(['middleware' => 'EmployerMiddleware', ], function(){
    Route::resource('vacancies', '\App\Http\Controllers\Front\VacancyController')->except(['destroy', 'show']);
});
Route::get('/view-vacancy/{vacancies}', [VacancyController::class, 'show'])->name('view-vacancy');
Route::get('/change-status-vacancy/{vacancy_id}/{status}','Front\VacancyController@changeStatusVacancy')->name('change-status-vacancy')->middleware('EmployerMiddleware');;
Route::get('/feedback','Front\VacancyController@feedback')->name('feedback')->middleware('EmployerMiddleware');
Route::get('/search','Front\VacancyController@search')->middleware('EmployerMiddleware');
