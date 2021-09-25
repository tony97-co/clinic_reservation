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
Route::get('/dashbord', function () {
    return view('doctorDashbord.index');
});
Route::resource('/interviews', 'InterviewController');

Route::resource('clinics', 'ClinicsController');
Route::get('/clinic/{id}/delete', 'ClinicsController@destroy');
Route::resource('doctors', 'DoctorsController');
Route::post('/doctors/{id}/update', 'DoctorsController@update');
Route::resource('lapDoctors', 'lapDoctorsController');
//specialties
Route::get('/specialties/create', 'SpecialistsController@create');
Route::get('/specialties', 'SpecialistsController@index');
Route::get('/Specialty/{id}/delete', 'SpecialistsController@destroy');
Route::post('/specialties', 'SpecialistsController@store');

//interviews

Route::get('/interview/{id}/pind', 'InterviewController@pind');
Route::get('/interview/{id}/finish', 'InterviewController@finsh');
Route::get('/clinic/interviews', 'InterviewController@clinicInterviews');
Route::get('/doctor/{id}/newinterviews', 'DoctorsController@newInterviews');
Route::get('/doctor/{id}/pindingInterviews', 'DoctorsController@pinnededInterviewa');
Route::get('/doctor/{id}/fineshedInterviews', 'DoctorsController@fineshedInterviewa');
Route::get('/doctor/profile', 'DoctorsController@profile');
Route::get('/profile/doctor/{id}/edit', 'DoctorsController@profileEdit');
Route::get('/profile/doctor/{id}/update', 'DoctorsController@profileUpdate');
//patients

Route::get('/patient/{id}/interviews', 'PatientController@interviews');

Auth::routes();
//reports for clinic
//********************************************** */
//the blade for doctors report
Route::get('/clinic/doctors/report', 'ClinicsController@clinicDoctorsReport');
// the api for interviews based on web auth clinic user id
Route::get('/d', 'ClinicsController@s');
//the blade interviews report
Route::get('/clinic/interviews/report', 'InterviewController@clinicInterviewsreport');
// the api for interviews based on web auth clinic user id
Route::get('/ahmed', 'InterviewController@m');
Route::post('/examinations/add/{id}','examinationsController@store');
//super Admin 
//********************************************************************* */
//all doctors on the sidenav blade
Route::get('/superAdmin/doctors','DoctorsController@superIndex');
Route::get('/patients', 'PatientController@index');
Route::get('/superAdmin/interviews','InterviewController@superAdminInterviews');
//Reports
//*************************************************************************** */
//تقرير عن جميع المقابلات
Route::get('/superAadmin/interviews/report', 'reportsController@interviews');
Route::get('/superAadmin/clinics/report', 'reportsController@clinics');
Route::get('/superAadmin/patients/report', 'reportsController@patients');
Route::get('/superAadmin/doctors/report', 'reportsController@doctors');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Examinations
/*********************************************************** */
//Examinations show
Route::get('/examination/{id}','examinationsController@show');
//the route for adding the resualt for the lapdoctor
Route::post('/examination/{id}/update','examinationsController@update');

Route::get('/examination/{id}/delate','examinationsController@destroy');

Route::get('/examination/{id}/edit','examinationsController@edit');

Route::get('/examination/{id}/pind','examinationsController@pindExamination');

Route::get('/result/{id}/show','examinationsController@resultShow');

Route::get('/lapdoctor/{id}/delete','lapDoctorsController@destroy');
Route::get('/lapdoctor/{id}/edit','lapDoctorsController@edit');
//الفحوصات الجديد حسب طبيبالمعمل
Route::get('/newExaminations','lapDoctorsController@newExaminations');
//الفحوصات المجمدة حسب طبيبالمعمل
Route::get('/pindedExaminations','lapDoctorsController@pindedExaminations');
//الفحوصات المكتملة حسب طبيبالمعمل
Route::get('/finshedExaminations','lapDoctorsController@finshedExaminations');
//الفحوصات المكتملة حسب طبيبالمعمل
Route::get('/clinic/examinations','examinationsController@clinicAdminExaminations');
