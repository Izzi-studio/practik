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


Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes(['verify' => true]);
Auth::routes();
Route::post('/check-email','Auth\RegisterController@existsEmail')->name('check-email'); //check email in db
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

//static page
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/howto', 'HomeController@howto')->name('howto');
Route::get('/services', 'HomeController@services')->name('services');
Route::get('/employer', 'HomeController@employer')->name('employer');
//static page end
Route::get('/companies', 'HomeController@companies')->name('companies');
Route::get('/callback', 'Front\ContactController@callback')->name('callback');
Route::post('/send-message','Front\ContactController@sendEmail')->name('contact.send');

//profile
Route::get('/profile','Front\ProfileController@index')->name('profile_view');
Route::put('/profile','Front\ProfileController@update')->name('profile_update');
//passwords routes
Route::get('change-password', 'Auth\UpdatePasswordController@index');
Route::post('change-password', 'Auth\UpdatePasswordController@store')->name('update.password');
Route::get('forget-password', 'Auth\ForgotPasswordController@showForgetPasswordForm')->name('forget.password.get');
Route::post('forget-password', 'Auth\ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post');
Route::get('reset-password/{token}', 'Auth\ResetPasswordController@showResetPasswordForm')->name('reset.password.get');
Route::post('reset-password', 'Auth\ResetPasswordController@submitResetPasswordForm')->name('reset.password.post');
//profile end

//employers routes
Route::group(['middleware' => 'EmployerMiddleware', ], function(){
    Route::resource('vacancies', '\App\Http\Controllers\Front\VacancyController');
	Route::resource('proposals', '\App\Http\Controllers\Front\ProposalController',
	['only' => [
		'index', 'destroy']]);
	Route::get('/proposals/{proposal}/accepted', '\App\Http\Controllers\Front\ProposalController@accepted')->name('proposals.accepted');
	Route::get('/proposals/{proposal}/approved', '\App\Http\Controllers\Front\ProposalController@approved')->name('proposals.approved');
	Route::get('/resume/export-pdf','Front\ProposalController@downloadPdf')->name('export-pdf');
	Route::get('/resume/{proposal}', 'Front\ProposalController@show')->name('proposal.show');
	Route::get('/change-status-vacancy/{vacancy_id}/{status}','Front\VacancyController@changeStatusVacancy')->name('change-status-vacancy');//to do
	Route::get('/feedback','Front\VacancyController@feedback')->name('feedback');//to do
	Route::get('/search','Front\VacancyController@search')->name('search'); //to do
});
//employers routes end

//Route::post('/get-states','Front\LocationController@getStatesByCountryId')->name('get-states');
//Route::post('/get-cities','Front\LocationController@getCitiesByStateId')->name('get-cities');

Route::get('/view-vacancy/{vacancy}', 'Front\VacancyController@viewVacancy')->name('viewVacancy');
Route::post('/view-vacancy/{vacancy}', 'Front\VacancyController@applyVacancy')->name('applyVacancy');
Route::get('/change-status-vacancy/{vacancy_id}/{status}','Front\VacancyController@changeStatusVacancy')->name('change-status-vacancy')->middleware('EmployerMiddleware');;
Route::get('/feedback','Front\VacancyController@feedback')->name('feedback')->middleware('EmployerMiddleware');
Route::get('/search','Front\VacancyController@searchVacancies')->name('vacancies.search');
Route::post('/search','Front\VacancyController@searchVacancies')->name('vacancies.search');



//students routes
Route::get('/categories', 'Front\CategoryController@index')->name('categories');
Route::resource('student-proposals', '\App\Http\Controllers\Front\ProposalController',
	['only' => [
		'index', 'destroy']]);
//students routes end
