<?php

use App\Http\Controllers\ClinicsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorsController;

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
Route::get('/h', function () {
    return view('superAdmin.home');
});


Route::resource('clinics', 'ClinicsController');
Route::resource('doctors', 'DoctorsController');
Route::resource('lapDoctors', 'lapDoctorsController');
//specialties
Route::get('/specialties/create', 'SpecialistsController@create');
Route::get('/specialties', 'SpecialistsController@index');
Route::post('/specialties', 'SpecialistsController@store');
//interviews

Route::get('/clinic/interviews', 'InterviewController@clinicInterviews');

Auth::routes();
//reports for clinic
//********************************************** */
//the blade for doctors report
Route::get('/clinic/doctors/report', 'ClinicsController@clinicDoctorsReport');
// the api for interviews based on web auth clinic user id
Route::get('/d', 'ClinicsController@d');
//the blade interviews report
Route::get('/clinic/interviews/report', 'InterviewController@clinicInterviewsreport');
// the api for interviews based on web auth clinic user id
Route::get('/ahmed', 'InterviewController@m');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
Route::get('{any}',function(){
    return view('Examinations.index');
})->where('any','.*');