<?php
use App\Http\Controllers\api\specialistController;
use App\Http\Controllers\api\usercontroller;
use App\Http\Controllers\api\PatientController;
use App\Http\Controllers\api\clinicsController;
use App\Http\Controllers\api\doctorsController ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//patient apis
Route::post('/Patient/register',[PatientController::class,'Register']);
Route::post('/Patient/login',[PatientController::class,'login']);
Route::post('/Patient/{id}/profile',[PatientController::class,'profile']);
//clinics api
//*************************************************** *
//عرض جميع العيادات
Route::get('/clinics',[clinicsController::class,'index']);
//عرض العيادة وجميع الاطباء بها
Route::get('/clinic/{id}',[clinicsController::class,'show']);
      //عرض الاطبا حسب قم العيادة
Route::get('/clinic/{id}/doctors',[clinicsController::class,'clinicDoctors']);

//******************************************************** */

//التخصصات

//******************************************************** */
//جميع التخصصات
Route::get('/specialists',[specialistController::class,'index']);

//******************************************************** */
//الاطباء عن طريق رقم العيادة والتخصص
Route::get('/clinic/{clinic}/specialist/{specialist}/doctors',[doctorsController ::class,'byClinicAndSspecialist']);